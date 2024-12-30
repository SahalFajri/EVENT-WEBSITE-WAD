<?php

use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\MerchandiseController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
})->name('home');

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Sign Up
Route::get('/sign-up', [AuthController::class, 'signUpPage'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Dashboard
    Route::get('', function () {
        return view('dashboard.dashboard');
    })->name('index');

    // User Admin
    Route::resource('admin', AdminController::class);

    // Merchandise Admin
    Route::resource('merchandise', MerchandiseController::class);

    // Article Admin
    Route::get('article', function () {
        return view('dashboard.article.index');
    })->name('article.index');

    // Gallery Admin
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
});


// Article Users
Route::get('/article', function () {
    return view('user.article.index', ['title' => 'Article']);
})->name('user.article.index');

Route::get('/article/show', function () {
    return view('user.article.show', ['title' => 'Article']);
})->name('user.article.show');

// Ticket Users
Route::get('/ticket', [TicketController::class, 'index'])->name('user.ticket.index');
Route::get('/ticket/show', [TicketController::class, 'show'])->name('user.ticket.show');

// Gallery Users
Route::get('/gallery', function () {
    return view('user.gallery.index', ['title' => 'Gallery']);
})->name('user.gallery.index');
