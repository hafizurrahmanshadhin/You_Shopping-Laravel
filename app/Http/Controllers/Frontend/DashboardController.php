<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();
        $orders = Order::with(['carts.product'])
                       ->where('user_id', $user->id)
                       ->where('payment_status', 'successful')
                       ->get();

        $data = Order::with(['carts.product'])
                       ->where('user_id', $user->id)
                       ->where('payment_status', 'pending')
                       ->get();

        return view('frontend.layout.dashboard', compact('orders', 'data'));
    }
}
