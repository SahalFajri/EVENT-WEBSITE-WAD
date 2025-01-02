<?php

namespace App\Services;

use App\Models\OrderTicket;
use Exception;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class MidtransService
{
  protected string $serverKey;
  protected string $isProduction;
  protected string $isSanitized;
  protected string $is3ds;
  protected string $clientKey;

  /**
   * MidtransService constructor.
   *
   * Menyiapkan konfigurasi Midtrans berdasarkan pengaturan yang ada di file konfigurasi.
   */
  public function __construct()
  {
    // Konfigurasi server key, environment, dan lainnya
    $this->serverKey = config('services.midtrans.serverKey');;
    $this->isProduction = config('services.midtrans.isProduction');
    $this->isSanitized = config('services.midtrans.isSanitized');
    $this->is3ds = config('services.midtrans.is3ds');
    $this->clientKey = config('services.midtrans.clientKey');


    // Mengatur konfigurasi global Midtrans
    Config::$serverKey = $this->serverKey;
    Config::$isProduction = $this->isProduction;
    Config::$isSanitized = $this->isSanitized;
    Config::$is3ds = $this->is3ds;
    Config::$clientKey = $this->clientKey;
  }

  /**
   * Membuat snap token untuk transaksi berdasarkan data order.
   *
   * @param OrderTicket $order Objek order yang berisi informasi transaksi.
   *
   * @return string Snap token yang dapat digunakan di front-end untuk proses pembayaran.
   * @throws Exception Jika terjadi kesalahan saat menghasilkan snap token.
   */
  public function createSnapToken(OrderTicket $order): string
  {
    // data transaksi
    $params = [
      'transaction_details' => [
        'order_id' => $order->id,
        'gross_amount' => $order->gross_amount,
      ],
      'item_details' => $this->mapItemsToDetails($order),
      'customer_details' => $this->getCustomerDetails($order),
    ];


    try {
      // Membuat snap token
      return Snap::getSnapToken($params);
    } catch (Exception $e) {
      // Menangani error jika gagal mendapatkan snap token
      throw new Exception($e->getMessage());
    }
  }

  /**
   * Memvalidasi apakah signature key yang diterima dari Midtrans sesuai dengan signature key yang dihitung di server.
   *
   * @return bool Status apakah signature key valid atau tidak.
   */
  public function isSignatureKeyVerified(): bool
  {
    $notification = new Notification();

    // Membuat signature key lokal dari data notifikasi
    $localSignatureKey = hash(
      'sha512',
      $notification->order_id . $notification->status_code .
        $notification->gross_amount . $this->serverKey
    );

    // Memeriksa apakah signature key valid
    return $localSignatureKey === $notification->signature_key;
  }

  /**
   * Mendapatkan data order berdasarkan order_id yang ada di notifikasi Midtrans.
   *
   * @return OrderTicket Objek order yang sesuai dengan order_id yang diterima.
   */
  public function getOrder(): OrderTicket
  {
    $notification = new Notification();

    // Mengambil data order dari database berdasarkan order_id
    return OrderTicket::where('id', $notification->order_id)->first();
  }

  /**
   * Mendapatkan status transaksi berdasarkan status yang diterima dari notifikasi Midtrans.
   *
   * @return string Status transaksi ('success', 'pending', 'expire', 'cancel', 'failed').
   */
  public function getStatus(): string
  {
    $notification = new Notification();
    $transactionStatus = $notification->transaction_status;
    $fraudStatus = $notification->fraud_status;

    return match ($transactionStatus) {
      'capture' => ($fraudStatus == 'accept') ? 'success' : 'pending',
      'settlement' => 'success',
      'deny' => 'failed',
      'cancel' => 'cancel',
      'expire' => 'expire',
      'pending' => 'pending',
      default => 'unknown',
    };
  }

  /**
   * Memetakan item dalam order menjadi format yang dibutuhkan oleh Midtrans.
   *
   * @param OrderTicket $order Objek order yang berisi daftar item.
   * @return array Daftar item yang dipetakan dalam format yang sesuai.
   */
  protected function mapItemsToDetails(OrderTicket $order): array
  {
    $itemDetails = [];

    foreach ($order->details as $detail) {
      $itemDetails[] = [
        'id' => $detail->ticket_id,
        'category' => 'Ticket',
        'price' => $detail->price,
        'quantity' => $detail->quantity,
        'name' => $detail->ticket->name, // Mengambil nama atau tipe berdasarkan relasi
      ];
    }

    return $itemDetails;
  }

  /**
   * Mendapatkan informasi customer dari order.
   * Data ini dapat diambil dari relasi dengan tabel lain seperti users atau tabel khusus customer.
   *
   * @param OrderTicket $order Objek order yang berisi informasi tentang customer.
   * @return array Data customer yang akan dikirim ke Midtrans.
   */
  protected function getCustomerDetails(OrderTicket $order): array
  {
    // Sesuaikan data customer dengan informasi yang dimiliki oleh aplikasi Anda
    return [
      'first_name' => $order->user->name,
      'email' => $order->user->email,
      'phone' => $order->user->phone,
    ];
  }
}
