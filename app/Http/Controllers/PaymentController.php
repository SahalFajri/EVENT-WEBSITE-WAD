<?php

namespace App\Http\Controllers;

use App\Models\OrderTicket;
use App\Models\Ticket;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function storeOrderTicket(Ticket $ticket, Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        if ($ticket->stock < $validatedData['quantity']) {
            return back()->with('error', 'Stock ticket is not enough');
        }

        $ticket->decrement('stock', $validatedData['quantity']);

        $gross_amount = $validatedData['quantity'] * $ticket->price;

        $newOrderData['id'] = 'ORDER-TICKET-' . time();
        $newOrderData['user_id'] = $user->id;
        $newOrderData['status'] = 'UNPAID';
        $newOrderData['snap_token'] = '';
        $newOrderData['gross_amount'] = $gross_amount;
        $newOrderData['notes'] = $validatedData['notes'];

        $order = OrderTicket::create($newOrderData);

        $order->details()->create([
            'ticket_id' => $ticket->id,
            'quantity' => $validatedData['quantity'],
            'price' => $ticket->price,
        ]);

        return redirect()->route('checkout.show', ['order' => $order]);
    }

    /**
     * @throws \Exception
     */
    public function showCheckout(OrderTicket $order, MidtransService $midtransService)
    {
        if ($order->status == 'PAID') {
            return redirect()->route('dashboard.order.show', ['order' => $order]);
        }

        if ($order->snap_token == null) {
            $snapToken = $midtransService->createSnapToken($order);
        } else {
            $snapToken = $order->snap_token;
        }

        $order->update([
            'snap_token' => $snapToken,
            'status' => 'PENDING',
        ]);

        $title = 'Checkout';

        return view('checkout.show', compact('order', 'snapToken', 'title'));
    }

    /**
     * Menangani notifikasi dari Midtrans.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function midtransCallback(Request $request, MidtransService $midtransService)
    {
        if ($midtransService->isSignatureKeyVerified()) {
            $order = $midtransService->getOrder();

            if ($midtransService->getStatus() == 'success') {
                $order->update([
                    'status' => 'PAID',
                ]);
            }

            if ($midtransService->getStatus() == 'pending') {
                $order->update([
                    'status' => 'PENDING',
                ]);
            }

            if ($midtransService->getStatus() == 'expire') {
                $order->update([
                    'status' => 'EXPIRED',
                ]);

                $order->details->each(function ($detail) {
                    $detail->ticket->increment('stock', $detail->quantity);
                });
            }

            if ($midtransService->getStatus() == 'cancel') {
                $order->update([
                    'status' => 'CANCELED',
                ]);

                $order->details->each(function ($detail) {
                    $detail->ticket->increment('stock', $detail->quantity);
                });
            }

            if ($midtransService->getStatus() == 'failed') {
                $order->update([
                    'status' => 'FAILED',
                ]);

                $order->details->each(function ($detail) {
                    $detail->ticket->increment('stock', $detail->quantity);
                });
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
