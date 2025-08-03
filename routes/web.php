<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Frontend\AffiliateController;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\Frontend\CampaignController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContinuityController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\DynamicPageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\PreoderController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\SubscribesController;
use Illuminate\Support\Facades\Route;

//!Route for HomeController
Route::get('/', [HomeController::class, 'index'])->name('homepage');

//!Route for HomeController
Route::get('/payment/success/{token}', [HomeController::class, 'paymentSuccess'])->name('order.success');

//!Route for HomeController
Route::get('/payment/cancel/{token}', [HomeController::class, 'paymenCancel'])->name('order.cancel');

//!Route for HomeController
Route::get('/whoweare', [HomeController::class, 'show'])->name('whoweare');

//!Route for PreoderController
Route::get('/preoder', [PreoderController::class, 'index'])->name('preoder.index');

//!Route for ContinuityController
Route::get('/continuity', [ContinuityController::class, 'index'])->name('continuity');

//!Route for AffiliateController
Route::get('/affiliate', [AffiliateController::class, 'index'])->name('affiliate');

//!Route for CampaignController
Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign');

//!Route for PostController
Route::get('/community', [PostController::class, 'index'])->name('post.index');
Route::post('/community/store', [PostController::class, 'store'])->name('post.store');
Route::get('/community/{slug}', [PostController::class, 'singlepost'])->name('post.singlepost');

//!Route for ShopController
Route::get('/shop', [ShopController::class, 'shop'])->name('shop.category');

//!Route for SubscribesController
Route::post('/subscribes', [SubscribesController::class, 'storeEmail'])->name('store.email');

//!Route for AnnouncementController
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::get('/single-announcement/{slug}', [AnnouncementController::class, 'show'])->name('single-announcement');

//!Route for ProfileController
Route::post('/update-profile', [ProfileController::class, 'UpdateProfile'])->name('update.profile');
Route::post('/update-profile-password', [ProfileController::class, 'UpdatePassword'])->name('update.Password');

//!Route for CartController
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

//!Route for OrderController
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});

Route::get('/user/profile', [DashboardController::class, 'index'])->name('userprofile')->middleware('auth', 'role:user');

//! Route for DynamicPageController
Route::get('page/{page_slug}', [DynamicPageController::class, 'index'])->name('custom.page');

Auth::routes();
