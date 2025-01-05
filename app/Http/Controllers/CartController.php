<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('merchandise')->get();
        return view('user.cart.index', compact('cartItems'));
    }

    public function add(Request $request, Merchandise $merchandise)
    {
        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'merchandise_id' => $merchandise->id],
            ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
        );

        return back()->with('success', 'Item added to cart!');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Item removed from cart!');
    }
}
