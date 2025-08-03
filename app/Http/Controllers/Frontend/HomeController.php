<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\View\View;
use App\Models\ProductPromotion;
use App\Http\Controllers\Controller;
use App\Models\MainstreamEntertainment;

class HomeController extends Controller {
    /**
     * Fetches all active MainstreamEntertainments and the first active, free ProductPromotion.
     * Returns the home view with this data.
     *
     * @return View
     */
    public function index() {
        $MainstreamEntertainments = MainstreamEntertainment::where('status', 'active')->get();
        $ProductPromotions        = ProductPromotion::where('status', 'active')->where('promotion_type', 'Free')->first();
        return view('frontend.layout.home', compact('MainstreamEntertainments', 'ProductPromotions'));
    }

    public function show(){
        return view('frontend.layout.whoweare');
    }

    public function paymentSuccess($token){
        $order = Order::where('transaction_token', $token)->first();
        if ($order) {
            $order->update(['payment_status' => 'successful']);
        }
        return view('frontend.payment.success');
    }

    public function paymenCancel($token){
        $order = Order::where('transaction_token', $token)->first();
        if ($order) {
            $order->update(['payment_status' => 'cancelled']);
        }
        return view('frontend.payment.cancel');
    }
}
