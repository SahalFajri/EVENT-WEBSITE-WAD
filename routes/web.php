<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('home');
})->name('home');

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('admin', function () {
    return view('admin.admin.index');
});

Route::get('merchandise', function () {
    return view('admin.merchandise.index');
});

Route::get('/article', function () {
    return view('user.article.index', ['title' => 'Article']);
})->name('user.article.index');

Route::get('article/show', function () {
    return view('user.article.show');
})->name('user.article.show');

// lihat tampila doang
Route::get('admin/article', function () {
    return view('admin.article.index');
});

// Ticket Users
Route::get('ticket', [TicketController::class, 'index'])->name('user.ticket.index');
Route::get('ticket/show', [TicketController::class, 'show'])->name('user.ticket.show');
