<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

// Redirect home ke kasir
Route::get('/', function () {
    return redirect()->route('transactions.create');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// Produk
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Transaksi
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

