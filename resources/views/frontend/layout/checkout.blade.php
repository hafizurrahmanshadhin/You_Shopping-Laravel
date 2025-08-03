@extends('frontend.app')

@section('title')
    Checkout
@endsection

@push('style')
    <style>
        .extended--footer .extra--wrapper {
            display: none;
        }
    </style>
@endpush

@section('content')
    <main class="checkout--main--area--wrapper">
        <section class="checkout--info--area--wrapper">
            <div class="container">
                <h3 class="affiliate--common-title">Check Your INFO</h3>

                <div class="checkout--info--area--content">
                    <div class="left">
                        <form action="#">
                            <!-- cart items -->
                            <div id="cart-items-container" class="cart--items--list--wrapper">
                                {{-- All Products Are here --}}
                            </div>

                            <!-- final pricing area -->
                            <div class="final--pricing--area">
                                <div class="price--list">
                                    <ul>
                                        <li>
                                            <p>Subtotal</p>
                                            <p>$<span>0.00</span></p>
                                        </li>
                                        <li>
                                            <p>Shipping</p>
                                            <p>$<span>0.00</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="total--price">
                                    <p>Total</p>
                                    <p>$<span>0.00</span></p>
                                </div>
                            </div>
                        </form>
                    </div>



                    <div class="right">
                        <h3 class="hero--text">General Information</h3>
                        <!-- auth form -->
                        <form id="checkout-form" action="{{ route('order.store') }}" method="POST"
                            class="auth--form--wrapper">
                            @csrf
                            <div class="input--wrapper">
                                <input type="text" name="address" placeholder="ADDRESS" required />
                                <input type="text" name="town_city" placeholder="TOWN/CITY" required />
                                <input type="number" name="phone" placeholder="PHONE" required />
                                <input type="hidden" name="cart" id="cart-data">
                                <input type="hidden" name="shipping_service" id="selected-shipping-service">
                                <input type="hidden" name="payment_option" id="selected-payment-option">
                            </div>

                            <!-- shipping services wrapper -->
                            <div class="shipping--services--wrapper">
                                <h3 class="hero--text">Shipping Service</h3>
                                <div class="input--wrapper">
                                    <div class="single--service">
                                        <input type="radio" name="shipping-services" id="express" />
                                        <label for="express">
                                            <p class="title">Express Delivery</p>
                                            <p class="description">We deliver in 1-2 days</p>

                                            <p class="price">$<span>10.00</span></p>
                                        </label>
                                    </div>
                                    <div class="single--service">
                                        <input type="radio" name="shipping-services" id="standard" />
                                        <label for="standard">
                                            <p class="title">Standard Delivery</p>
                                            <p class="description">We deliver in 1-2 days</p>

                                            <p class="price">$<span>5.00</span></p>
                                        </label>
                                    </div>
                                    <div class="single--service">
                                        <input type="radio" name="shipping-services" id="store" />
                                        <label for="store">
                                            <p class="title">Pickup from store</p>
                                            <p class="description">Today</p>

                                            <p class="price">$<span>0.00</span></p>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- payment options wrapper -->
                            <div class="payment--options--wrapper">
                                <h3 class="hero--text">Payment options</h3>

                                <div class="select--wrapper">
                                    <select required name="payment-options" id="">
                                        <option value="stripe">Stripe</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="submit--btn">CONFIRM</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
