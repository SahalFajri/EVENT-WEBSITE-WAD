<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\MerchandiseController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return redirect()->route('home');
})->name('home');

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

// Admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Merchandise Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('merchandise', MerchandiseController::class);
});
// Article Admin
Route::get('/admin/article', function () {
    return view('admin.article.index');
})->name('admin.article.index');

// Gallery Admin
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');

// Article Users
Route::get('/article', function () {
    return view('user.article.index', ['title' => 'Article']);
})->name('user.article.index');

Route::get('/article/show', function () {
    return view('user.article.show');
})->name('user.article.show');

// Ticket Users
Route::get('/ticket', [TicketController::class, 'index'])->name('user.ticket.index');
Route::get('/ticket/show', [TicketController::class, 'show'])->name('user.ticket.show');

// Gallery Users
Route::get('/gallery', function () {
    return view('user.gallery.index', ['title' => 'Gallery']);
})->name('user.gallery.index');

