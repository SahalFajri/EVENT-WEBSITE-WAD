<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('app');
});

Route::get('admin', function () {
    return view('admin.admin.index');
});

Route::get('merchandise', function () {
    return view('admin.merchandise.index');
});
Route::get('/article', function () {
    return view('user.article.index');
})->name('user.article.index');

Route::get('article/show', function () {
    return view('user.article.show');
})->name('user.article.show');

// lihat tampila doang
Route::get('article', function () {
    return view('admin.article.index');
});