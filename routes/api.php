<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

// Callback Midtrans
Route::post('/midtrans-callback', [CheckoutController::class, 'callback']);

