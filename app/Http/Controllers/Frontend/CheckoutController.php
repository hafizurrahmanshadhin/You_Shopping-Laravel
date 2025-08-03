<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class CheckoutController extends Controller {
    public function index() {
        $carts = Cart::get();
        return view('frontend.layout.checkout', compact('carts'));
        // return view('frontend.layout.checkout');
    }
}
