<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderMerchandiseController extends Controller
                                                {
  public function index()
  {
    $order = Order::all(); // Get all users
    return view('dashboard.order-merchandise.index', compact('order'));
  }

  public function show(Order $order)
  {
    $order = $order;
    return view('dashboard.order-merchandise.show', compact('order'));
  }

}
