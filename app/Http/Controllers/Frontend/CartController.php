<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller {
    /**
     * Validates the request data, then stores each item in the cart for the authenticated user.
     * If successful, redirects to the checkout index with a success message.
     * If validation fails or storing the cart fails, redirects back with the appropriate error message.
     *
     * @param Request $request The incoming HTTP request.
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'cart'              => 'required|array',
            'cart.*.quantity'   => 'required|integer|min:1',
            'cart.*.totalPrice' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userId = Auth::id();

        try {
            foreach ($request->cart as $productId => $item) {
                $cart              = new Cart;
                $cart->user_id     = $userId;
                $cart->product_id  = $productId;
                $cart->quantity    = $item['quantity'];
                $cart->total_price = $item['totalPrice'];
                $cart->save();
            }

            return redirect()->route('checkout.index')->with('t-success', 'Cart stored successfully');
        } catch (Exception) {
            return redirect()->back()->with('t-error', 'Failed to store cart');
        }
    }
}
