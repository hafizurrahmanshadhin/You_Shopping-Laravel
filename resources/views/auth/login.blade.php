@extends('frontend.app')

@section('title', 'LogIn')

@push('style')
<style>
    .extended--footer .extra--wrapper {
    display: none;
}
</style>
@endpush

@section('content')

    <!-- Main Area Starts -->
    <main>
        <section class="login--area--wrapper">
            <div class="login--area--content">
                <h3 class="hero--text">Log In</h3>

                <!-- auth form -->
                <form class="auth--form--wrapper" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input--wrapper">

                        <input type="email" class="@error('email') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="ENTER YOUR EMAIL" name="email" value="{{ old('email') }}" autocomplete="email"
                            autofocus required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="password" class="@error('password') is-invalid @enderror" id="exampleInputPassword1"
                            placeholder="ENTER YOUR PASSWORD" name="password" required autocomplete="current-password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <a href="{{ route('password.request') }}">Forget password ?</a>
                    </div>

                    <button type="submit" class="submit--btn">LOG IN</button>
                </form>

                <!-- instruction text -->
                <div class="instruction--text">
                    <p>New to this site? <a href="{{ route('register') }}">Sign Up</a></p>
                    <p>Or,</p>
                    <p><a href="{{route('shop.category')}}">Continue Shopping</a></p>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Area Ends -->
@endsection
