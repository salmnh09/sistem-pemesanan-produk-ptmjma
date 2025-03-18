<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;




Auth::routes();
Route::resource('kategori', KategoriController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/beli', [BerandaController::class, 'beli'])->name('beli');
Route::get('/cart', [BerandaController::class, 'viewCart'])->name('cart');
Route::post('/add-to-cart/{id}', [BerandaController::class, 'addToCart'])->name('add.to.cart');
Route::post('checkout',[CartController::class,'checkout'])->name('checkout');
