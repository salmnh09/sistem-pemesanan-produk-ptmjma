<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('keranjang', compact('cartItems'));
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
    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('pelanggan.login')->with('error', 'Anda harus login terlebih dahulu untuk checkout.');
        }


        // // Simpan data pemesan dan pesanan ke database (contoh sederhana)
        $order = [
            'user_id' => Auth::user()->id, // Pastikan form mengirim no_hp (bukan nomor_hp)
            'total_harga' => Cart::getTotal(),
        ];
        // dd($order);
        // dd(Cart::getContent());
        // // Simpan order ke database (sesuaikan dengan model Order jika ada)
      $beli=Order::create($order);
        foreach (Cart::getContent() as $item) {
            OrderDetail::create([
                'order_id' => $beli->id,  // Menghubungkan order dengan detailnya
                'produk_id' => $item->id,  // Asumsikan ID produk dari cart sesuai dengan produk di DB
                'jumlah' => $item->quantity,
                'harga' => $item->price,
            ]);
        }
        Cart::clear(); // Kosongkan keranjang setelah checkout

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function cartUpdate(Request $request)
    {
        foreach ($request->qty as $id => $quantity) {
            Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ]
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function success()
    {
        return view('checkout_success');
    }
}
