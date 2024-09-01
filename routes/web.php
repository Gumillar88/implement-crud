<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class)->only(['create', 'store', 'show']);
Route::get('orders/', [OrderController::class, 'orderRender'])->name('orders.render');
Route::get('orders/datatables', [OrderController::class, 'index'])->name('orders.datatables');