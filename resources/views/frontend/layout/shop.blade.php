@extends('frontend.app')

@section('title')
    Shop
@endsection

@push('style')
    <style>
        .extended--footer .extra--wrapper {
            display: none;
        }
    </style>
@endpush

@section('content')
    <main>
        {{-- banner area starts --}}
        <section class="shop--banner--area--wrapper">
            <div class="container">
                <div class="shop--banner--area--content">
                    <h3 class="common--banner--title">SHOP THE STORIES YOU LOVE</h3>

                    <a href="#shopnow" class="btn--primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="205" height="67" viewBox="0 0 205 67"
                            fill="none">
                            <path
                                d="M17.1908 1C5.64128 1 -2.33462 12.5605 1.76563 23.3577L13.9176 55.3577C16.3505 61.7642 22.49 66 29.3428 66H175.657C182.51 66 188.65 61.7642 191.082 55.3577L203.234 23.3577C207.335 12.5605 199.359 1 187.809 1H17.1908Z"
                                fill="#FDFE0D" stroke="url(#paint0_linear_4513_2955)" />
                            <defs>
                                <linearGradient id="paint0_linear_4513_2955" x1="-86.7979" y1="121.5" x2="266.381"
                                    y2="75.2661" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FDFE0D" />
                                    <stop offset="1" stop-color="white" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <p>SHOP NOW</p>
                    </a>
                </div>
            </div>
        </section>
        {{-- banner area ends --}}

        {{-- product categories area starts --}}
        <section class="product--categories--area--wrappper section--gap">
            <div class="container">
                <h3 class="affiliate--common-title">PRODUCT CATEGORIES</h3>
                <div class="product--categories--area--content">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <div class="single--product">
                                        <img src="{{ asset($category->category_image) }}" alt="" />
                                        <div class="product--description">
                                            <p class="product--category--name">{{ $category->category_type }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74"
                            fill="none">
                            <g filter="url(#filter0_d_4513_2977)">
                                <path
                                    d="M58 35C58 30.975 57.825 27.3 57.125 25.2C56.425 22.75 55.55 20.475 53.45 18.375C50.825 15.925 48.55 15.225 45.05 14.525C42.6 14.175 39.625 14 37.875 14H36.3C34.375 14 31.575 14.175 28.95 14.525C25.45 15.225 23 16.1 20.55 18.375C18.275 20.475 17.575 22.75 16.875 25.2C16.175 27.3 16 30.975 16 35C16 39.025 16.175 42.7 16.875 44.8C17.575 47.25 18.45 49.525 20.55 51.625C23.175 54.075 25.45 54.775 28.95 55.475C31.75 56 35.25 56 37 56C38.75 56 42.25 56 45.225 55.475C48.55 54.775 51 54.075 53.625 51.625C55.725 49.7 56.6 47.425 57.3 44.8C57.825 42.7 58 39.025 58 35Z"
                                    fill="#FDFE0D" />
                                <path
                                    d="M42.2516 25.7242C41.5516 25.0242 40.5016 25.0242 39.8016 25.7242L31.7516 33.7742C31.0516 34.4742 31.0516 35.5242 31.7516 36.2242L39.8016 44.2742C40.5016 44.9742 41.5516 44.9742 42.2516 44.2742C42.9516 43.5742 42.9516 42.5242 42.2516 41.8242L35.4266 34.9992L42.2516 28.1742C42.9516 27.4742 42.9516 26.4242 42.2516 25.7242Z"
                                    fill="#141414" />
                            </g>
                            <defs>
                                <filter id="filter0_d_4513_2977" x="0" y="0" width="74" height="74"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="2" />
                                    <feGaussianBlur stdDeviation="8" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                        result="effect1_dropShadow_4513_2977" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4513_2977"
                                        result="shape" />
                                </filter>
                            </defs>
                        </svg>
                    </div>

                    <div class="button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74"
                            fill="none">
                            <g filter="url(#filter0_d_4513_2981)">
                                <path
                                    d="M16 35C16 30.975 16.175 27.3 16.875 25.2C17.575 22.75 18.45 20.475 20.55 18.375C23.175 15.925 25.45 15.225 28.95 14.525C31.4 14.175 34.375 14 36.125 14H37.7C39.625 14 42.425 14.175 45.05 14.525C48.55 15.225 51 16.1 53.45 18.375C55.725 20.475 56.425 22.75 57.125 25.2C57.825 27.3 58 30.975 58 35C58 39.025 57.825 42.7 57.125 44.8C56.425 47.25 55.55 49.525 53.45 51.625C50.825 54.075 48.55 54.775 45.05 55.475C42.25 56 38.75 56 37 56C35.25 56 31.75 56 28.775 55.475C25.45 54.775 23 54.075 20.375 51.625C18.275 49.7 17.4 47.425 16.7 44.8C16.175 42.7 16 39.025 16 35Z"
                                    fill="#FDFE0D" />
                                <path
                                    d="M31.7484 25.7242C32.4484 25.0242 33.4984 25.0242 34.1984 25.7242L42.2484 33.7742C42.9484 34.4742 42.9484 35.5242 42.2484 36.2242L34.1984 44.2742C33.4984 44.9742 32.4484 44.9742 31.7484 44.2742C31.0484 43.5742 31.0484 42.5242 31.7484 41.8242L38.5734 34.9992L31.7484 28.1742C31.0484 27.4742 31.0484 26.4242 31.7484 25.7242Z"
                                    fill="#141414" />
                            </g>
                            <defs>
                                <filter id="filter0_d_4513_2981" x="0" y="0" width="74" height="74"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="2" />
                                    <feGaussianBlur stdDeviation="8" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                        result="effect1_dropShadow_4513_2981" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4513_2981"
                                        result="shape" />
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        {{-- product categories area ends --}}

        {{-- latest produc area starts --}}
        <section class="latest--prouduct--area--wrapper section--gap">
            <div class="container">
                <h3 class="affiliate--common-title">LATEST PRODUCT</h3>
                <div class="popular--product--content">
                    @foreach ($latest_product as $product)
                        <div class="single--pouplar--product">
                            <div class="img--wrapper">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" />
                            </div>

                            <div class="description--wrapper">
                                <p class="prod--title">{{ $product->title }}</p>

                                <div class="pricing">
                                    <p class="past">$ <span>{{ $product->original_price }}</span></p>
                                    <p class="current">$ <span>{{ $product->discount_price }}</span></p>
                                </div>
                            </div>

                            {{-- Add the hovering info and image sections here --}}
                            <div class="product--hover--info">
                                <div class="action--button--wrapper">
                                    <a href="javascript:void(0)" class="cart--btn"
                                        onclick="addToCart('{{ $product->id }}', '{{ $product->title }}', '{{ $product->discount_price }}', '{{ asset($product->image) }}'); return false;">
                                        <img src="{{ asset('frontend/images/cart-icon.svg') }}" alt="" />
                                    </a>

                                    {{-- <a href="javascript:void(0)" class="share--btn">
                                        <img src="{{ asset('frontend/images/share-icon.svg') }}" alt="" />
                                    </a> --}}

                                </div>
                                <h3 class="prod--title">{{ $product->title }}</h3>

                                <div class="prod--pricing">
                                    <p class="past">$ <span>{{ $product->original_price }}</span></p>
                                    <p class="current">$ <span>{{ $product->discount_price }}</span></p>
                                </div>
                            </div>

                            {{-- hovering image --}}
                            <div class="hovering--image">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" />
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        {{-- latest produc area ends --}}

        {{-- popular product area starts --}}
        <section class="popular--product--area--wrapper section--gap" id="shopnow">
            <div class="container">
                <h3 class="affiliate--common-title">POPULAR PRODUCT</h3>
                <div class="popular--product--content">
                    @foreach ($products as $product)
                        <div class="single--pouplar--product">
                            <div class="img--wrapper">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" />
                            </div>

                            <div class="description--wrapper">
                                <p class="prod--title">{{ $product->title }}</p>

                                <div class="pricing">
                                    <p class="past">$ <span>{{ $product->original_price }}</span></p>
                                    <p class="current">$ <span>{{ $product->discount_price }}</span></p>
                                </div>
                            </div>

                            {{-- Add the hovering info and image sections here --}}
                            <div class="product--hover--info">
                                <div class="action--button--wrapper">
                                    <a href="javascript:void(0)" class="cart--btn"
                                        onclick="addToCart('{{ $product->id }}', '{{ $product->title }}', '{{ $product->discount_price }}', '{{ asset($product->image) }}'); return false;">
                                        <img src="{{ asset('frontend/images/cart-icon.svg') }}" alt="" />
                                    </a>

                                    {{-- <a href="javascript:void(0)" class="share--btn">
                                        <img src="{{ asset('frontend/images/share-icon.svg') }}" alt="" />
                                    </a> --}}

                                </div>
                                <h3 class="prod--title">{{ $product->title }}</h3>

                                <div class="prod--pricing">
                                    <p class="past">$ <span>{{ $product->original_price }}</span></p>
                                    <p class="current">$ <span>{{ $product->discount_price }}</span></p>
                                </div>
                            </div>

                            {{-- hovering image --}}
                            <div class="hovering--image">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Printify Code are here --}}
        <section class="popular--product--area--wrapper section--gap" id="content">
            <div class="container">
                <h3 class="affiliate--common-title">RECENT PRODUCT</h3>

                <div style="max-width: 1450px; margin: 0 auto; margin-top:70px;">
                    <div>
                        <a class="anchor" id="fitPrintAnchor" style="padding-top: 0px; margin-top: 0px;"></a>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/4.3.2/iframeResizer.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var iframe = $('#fitPrintIframe');
                                iframe.on('load', function() {
                                    iFrameResize({
                                        log: false,
                                        checkOrigin: false,
                                        heightCalculationMethod: 'taggedElement',
                                        autoResize: true,
                                        onMessage: function(messageData) {
                                            var jsonData = JSON.parse(messageData.message);
                                            if (jsonData.action == 'navigateTo') {
                                                window.onbeforeunload = null;
                                                window.parent.location.href = jsonData.data;
                                            }
                                            if (jsonData.action == 'scrollTo') {
                                                setTimeout(function() {
                                                    document.getElementById('fitPrintAnchor')
                                                        .scrollIntoView({
                                                            behavior: 'smooth',
                                                            block: 'center'
                                                        });
                                                }, 200);
                                            }
                                        }
                                    }, '#fitPrintIframe');
                                });
                            });
                        </script>
                        <iframe id="fitPrintIframe"
                            src="https://shop.fitprint.io/v2.html?shop=0a8969d8-72a8-47e7-ba15-788ca5103739"
                            style="width: 100%; height: 700px; overflow: auto;" frameborder="0" scrolling="yes"
                            allowfullscreen></iframe>
                        <style>
                            iframe {
                                width: 100%;
                                min-height: 700px;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </section>
        {{-- Printify Code end --}}

    </main>

    {{-- dely popup start --}}
    <div class="delay--popup--wrapper shop--page">
        <div class="delay--popup--content">
            <!-- book area -->
            <div class="book--part">
                <img src="{{ asset($product->image) }}" alt="" />
            </div>

            <!-- pre order button -->
            <a href="{{ route('preoder.index') }}" class="btn--primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="299" height="66" viewBox="0 0 299 66"
                    fill="none">
                    <path
                        d="M17.2563 0.5C4.66031 0.5 -3.29056 14.0445 2.84923 25.0427L20.7132 57.0428C23.6282 62.2643 29.1402 65.5 35.1203 65.5H263.88C269.86 65.5 275.372 62.2643 278.287 57.0428L296.151 25.0428C302.291 14.0445 294.34 0.5 281.744 0.5H17.2563Z"
                        fill="#FDFE0D" stroke="url(#paint0_linear_4764_5547)" />
                    <defs>
                        <linearGradient id="paint0_linear_4764_5547" x1="-128.777" y1="121" x2="380.452"
                            y2="23.0038" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FDFE0D" />
                            <stop offset="1" stop-color="white" />
                        </linearGradient>
                    </defs>
                </svg>

                <p>PRE ORDER NOW</p>
            </a>
            <!-- close popup -->
            <div class="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                    fill="none">
                    <g clip-path="url(#clip0_4764_5528)">
                        <path
                            d="M17.7484 15.0244L29.43 3.34258C30.1901 2.58272 30.1901 1.35409 29.43 0.594313C28.6701 -0.165552 27.4415 -0.165552 26.6817 0.594313L14.9999 12.276L3.31844 0.594313C2.55821 -0.165552 1.33004 -0.165552 0.570172 0.594313C-0.190057 1.35418 -0.190057 2.58272 0.570172 3.34258L12.2515 15.0244L0.570263 26.7061C-0.189966 27.4659 -0.189966 28.6946 0.570263 29.4543C0.750507 29.6351 0.964691 29.7784 1.20051 29.8762C1.43633 29.9739 1.68913 30.0241 1.9444 30.0238C2.44186 30.0238 2.93951 29.8334 3.31853 29.4543L14.9999 17.7726L26.6817 29.4543C26.862 29.6351 27.0762 29.7784 27.312 29.8761C27.5478 29.9738 27.8006 30.024 28.0559 30.0238C28.5533 30.0238 29.051 29.8334 29.43 29.4543C30.1901 28.6945 30.1901 27.4659 29.43 26.7061L17.7484 15.0244Z"
                            fill="#5A5C5F" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4764_5528">
                            <rect width="30" height="30" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
    </div>

    {{-- dely popup end --}}
@endsection
