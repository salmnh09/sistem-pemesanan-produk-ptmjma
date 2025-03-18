<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use Illuminate\Http\Request;
use App\Models\Produk;

class BerandaController extends Controller
{
    public function index()
    {
        $produk= Produk::with('kategori')->get();
        // dd($produk);
        return view('beranda',compact('produk'));
    }

    public function beli(Request $request) {
        // dd($request->id); // Debugging
        $produk = Produk::with('kategori')->get();
        if (!$produk) {
            return redirect()->route('beranda')->with('error', 'Produk tidak ditemukan.');
        }
        return view('beli', compact('produk'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Produk::find($id);
        $cart=Cart::add(
            [ 
                'id' => $product->id,
            'name' => $product->nama_produk,
            'price' => $product->harga,
            'quantity' => 1 
            ]
        );
        return redirect('cart');
            // dd(Cart::getContent());
    }

    public function viewCart()
    {
        $cartItems = Cart::getContent();
        return view('keranjang', compact('cartItems'));
    }
}
