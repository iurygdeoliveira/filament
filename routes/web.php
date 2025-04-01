<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::resource('/stores', App\Http\Controllers\StoreController::class);

Route::resource('/products', App\Http\Controllers\ProductController::class);
