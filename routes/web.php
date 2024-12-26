<?php

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
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

Route::resource('user', UserController::class);

Route::resource('superAdmin', SuperAdminController::class);
