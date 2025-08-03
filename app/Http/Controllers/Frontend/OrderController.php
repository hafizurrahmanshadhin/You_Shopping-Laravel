<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Stripe\Checkout\Session as StripeSession;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'town_city' => 'required',
            'phone' => 'required',
            'cart' => 'required|json',
            'shipping_service' => 'required',
            'payment_option' => 'required',
        ]);

        DB::beginTransaction();

        $shippingAddress = ShippingAddress::create([
            'address' => $validated['address'],
            'town_city' => $validated['town_city'],
            'phone' => $validated['phone'],
        ]);

        $cartItems = json_decode($validated['cart'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON format for cart.');
        }

        $subtotal = array_sum(array_map(function ($item) {
            return $item['totalPrice'] ?? 0;
        }, $cartItems));

        $shippingCost = $this->calculateShippingCost($validated['shipping_service']);
        $total = $subtotal + $shippingCost;

        $customOrderId = $this->generateCustomOrderId();

       
        $transactionToken = hash('sha256', uniqid(rand(), true));

        $order = Order::create([
            'order_id' => $customOrderId,
            'user_id' => auth()->id(),
            'shipping_address_id' => $shippingAddress->id,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'payment_status' => 'pending',
            'transaction_token' => $transactionToken
        ]);

        foreach ($cartItems as $item) {
            Cart::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'total_price' => $item['totalPrice'],
            ]);
        }

        DB::commit();

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Total Order',
                    ],
                    'unit_amount' => $total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('order.success', ['token' => $transactionToken]),
            'cancel_url' => route('order.cancel', ['token' => $transactionToken]),
        ]);

        return redirect()->to($session->url)->with('order_id', $order->id);
    }

    protected function generateCustomOrderId()
    {
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        $nextId = $lastOrder ? ((int) substr($lastOrder->order_id, 5) + 1) : 1;
        return 'ORDID' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
    }

    protected function calculateShippingCost($shippingService)
    {
        $cost = 0.00;

        switch ($shippingService) {
            case 'express':
                $cost = 10.00;
                break;
            case 'standard':
                $cost = 5.00;
                break;
            case 'store':
                $cost = 0.00;
                break;
            default:
                throw new Exception("Invalid shipping service selected.");
        }

        return $cost;
    }
}
