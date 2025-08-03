<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ShopController extends Controller {
    /**
     * Fetches all active ProductCategories and Products.
     * Returns the shop view with this data.
     *
     * @return View
     */
    public function shop() {
        $categories = ProductCategory::where('status', 'active')->get();
        $products   = Product::where('status', 'active')->get();
        $latest_product = Product::where('status', 'active')->latest()->take(6)->get();

        return view('frontend.layout.shop', compact('categories', 'products', 'latest_product'));
    }
}
