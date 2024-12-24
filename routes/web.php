<?php

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
