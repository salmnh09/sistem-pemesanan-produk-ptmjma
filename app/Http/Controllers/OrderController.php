<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index(){
        // $orders = Order::all();
        $orders = Order::with('user')->orderBy("id", "desc")->paginate(10);
        return view("order",compact("orders"));
    }

    function detail($id){
        $detail = Order::with(['user', 'orderDetails.produk'])->findOrFail($id);
        // dd($detail);
        return view("order_detail",compact("detail"));
    }
}
