<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$clientKey = config('services.midtrans.clientKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function processPayment(Request $request)
    {
        // Validasi request input
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        // Mendapatkan data order dari database
        $order = Order::with('user', 'details.item')->findOrFail($request->order_id);

        // Persiapan parameter untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->phone,
            ],
            'item_details' => $this->getItemDetails($order),
        ];

        try {
            // Mendapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Menampilkan halaman checkout dengan Snap Token
            return view('payment.checkout', [
                'snapToken' => $snapToken,
                'order' => $order
            ]);
        } catch (\Exception $e) {
            // Penanganan jika gagal mendapatkan Snap Token
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Mendapatkan detail item dari order.
     *
     * @param \App\Models\Order $order
     * @return array
     */
    private function getItemDetails(Order $order): array
    {
        $itemDetails = [];

        foreach ($order->details as $detail) {
            $itemDetails[] = [
                'id' => $detail->item_id,
                'category' => class_basename($detail->item_type), // Ambil nama model: Ticket atau Merchandise
                'price' => $detail->price,
                'quantity' => $detail->quantity,
                'name' => $detail->item->name ?? $detail->item->type, // Mengambil nama atau tipe berdasarkan relasi
            ];
        }

        return $itemDetails;
    }

    /**
     * Menangani notifikasi dari Midtrans.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function handleNotification(Request $request)
    {
        // Logika untuk menangani notifikasi pembayaran dari Midtrans
        $notification = json_decode($request->getContent(), true);

        // Cek status pembayaran dari Midtrans
        if ($notification['transaction_status'] === 'settlement') {
            $order = Order::find($notification['order_id']);
            if ($order) {
                $order->update(['status' => 'paid']);
            }
        }

        return response()->json(['message' => 'Notification processed'], 200);
    }
}
