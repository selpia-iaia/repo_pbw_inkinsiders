<?php

use App\Http\Controllers\ProductAtkController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung ke daftar produk
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Menangani semua fungsi CRUD (Index, Create, Store, Edit, Update, Destroy)
Route::resource('products', ProductAtkController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
