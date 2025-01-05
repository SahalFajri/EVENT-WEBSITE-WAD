<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Notification;
use Barryvdh\DomPDF\Facade\Pdf; 




class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil data keranjang
        $cartItems = Cart::where('user_id', Auth::id())->with('merchandise')->get();

        return view('user.checkout.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        // Setup Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    
        // Hitung total harga keranjang
        $totalPrice = $this->getCartTotal();  // Total harga keranjang
        if ($totalPrice <= 0) {
            return redirect()->route('user.cart.index')->with('error', 'Keranjang Anda kosong!');
        }
        
        // Ambil item keranjang
        $items = $this->getCartItems();  // Ambil daftar item keranjang
    
        // Buat transaksi dan simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $totalPrice,
            'status' => 'pending',  // Menyimpan item dalam format JSON
        ]);
    
        // Buat transaksi Midtrans
        $transaction_details = [
            'order_id' => $order->id ,
            'gross_amount' => $order->total,  // Total harga keranjang
        ];
    
        $customer_details = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];
    
        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details' => $items,
            'customer_details' => $customer_details,
        ];
    
        // Generate Snap Token
        $snapToken = Snap::getSnapToken($transaction_data);
    
        return view('user.checkout.payment', compact('snapToken', 'totalPrice', 'order'));
    }
    

    private function getCartTotal()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('merchandise')->get();
        return $cartItems->sum(function ($item) {
            return $item->merchandise->price * $item->quantity;
        });
    }

    private function getCartItems()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('merchandise')->get();
        $items = [];
        foreach ($cartItems as $item) {
            $items[] = [
                'id' => $item->merchandise->id,
                'price' => $item->merchandise->price,
                'quantity' => $item->quantity,
                'name' => $item->merchandise->name,
            ];
        }
        return $items;
    }
    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'settlement'){
            $order = Order::find($request->order_id);
            $order->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id)
    {
        // Cari data order berdasarkan ID
        $order = Order::find($id);
    
        // Jika order tidak ditemukan, tampilkan halaman 404
        if (!$order) {
            abort(404, 'Invoice not found');
        }
    
        // Tampilkan halaman invoice
        return view('user.invoice.index', compact('order'));
    }
        
        public function exportInvoice($id)
    {
        // Ambil data order berdasarkan ID
        $order = Order::find($id);

        // Periksa jika order tidak ditemukan
        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Order tidak ditemukan.');
        }

        // Buat PDF dari view yang ada
        $pdf = Pdf::loadView('user.invoice.pdf', compact('order'));

        // Download PDF
        return $pdf->download('invoice_' . $order->id . '.pdf');
    }

}
