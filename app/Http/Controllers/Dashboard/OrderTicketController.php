<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderTicket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderTicketController extends Controller
{
  public function index()
  {
    if (Auth::user()->role == 'superadmin') {
      $orders = OrderTicket::latest()->get();
    } else {
      $orders = Auth::user()->ordersTickets()->latest()->get();
    }
    return view('dashboard.order-ticket.index', compact('orders'));
  }

  public function show(OrderTicket $orderTicket)
  {
    $order = $orderTicket;
    return view('dashboard.order-ticket.show', compact('order'));
  }

  public function download_pdf()
  {
    $user = Auth::user();
    if ($user->role == 'superadmin') {
      $orders = OrderTicket::latest()->get();
    } else {
      $orders = $user->ordersTickets()->latest()->get();
    }
    $pdf = Pdf::loadView('dashboard.order-ticket.pdf', compact('orders'));
    return $pdf->stream('orders.pdf');
  }

  public function download_pdf_order(OrderTicket $orderTicket)
  {
    $order = $orderTicket;
    $pdf = Pdf::loadView('dashboard.order-ticket.pdf_order', compact('order'));
    return $pdf->stream('order-' . $order->id . '.pdf');
  }
}
