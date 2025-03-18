<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Darryldecode\Cart\Cart;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('checkout', compact('cartItems'));
    }

    public function Checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string|min:10|max:15',
        ]);

        // Simpan data pemesan dan pesanan ke database (contoh sederhana)
        $order = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'items' => Cart::getContent(),
            'total' => Cart::getTotal(),
        ];

        // Simpan order ke database (sesuaikan dengan model Order jika ada)
        // Order::create($order);

        Cart::clear(); // Kosongkan keranjang setelah checkout

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil dibuat!');
    }

    function CartUpdate(){
        
    }
    public function success()
    {
        return view('checkout_success');
    }
}
