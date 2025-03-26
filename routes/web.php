<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;




Auth::routes();
Route::resource('kategori', KategoriController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/beli', [BerandaController::class, 'beli'])->name('beli');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/checkout',[CartController::class,'checkout'])->name('cart.checkout');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::get('/checkout/success', function () {
    return view('checkout_success');
})->name('checkout.success');

Route::get('/login/pelanggan', [PelangganController::class, 'login'])->name('pelanggan.login');
Route::get('/register/pelanggan', [PelangganController::class, 'daftar'])->name('pelanggan.daftar');
Route::post('/register/aksi', [PelangganController::class, 'aksi_register'])->name('register.aksi');
Route::post('/login/aksi', [PelangganController::class, 'aksi_login'])->name('login.aksi');
Route::get('/pelanggan/profil', [PelangganController::class, 'profil'])->name('pelanggan.profil');
Route::post('/profil/update', [PelangganController::class, 'update_profil'])->name('profil.update');
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');

