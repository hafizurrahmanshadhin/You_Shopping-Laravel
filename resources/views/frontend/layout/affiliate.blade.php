@extends('frontend.app')

@section('title')
    Affiliate
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
        {{-- landing banner area starts --}}
        <section class="affiliate--banner--area--wrapper">
            <div class="container">
                <div class="affiliate--banner--area--content">
                    <h3 class="hero--text">LET’S BUILD YOUR PLATFORM!</h3>
                </div>
            </div>
        </section>
        {{-- landing banner area ends --}}



        {{-- don't be him section area starts --}}
        <section class="about--continuity--area--wrapper trouble--area--wrapper section--gap">
            <div class="container">
                <div class="about--continuity--area--content">
                    <div class="left">
                        <img src="{{ asset('frontend/images/trouble-area-banner.png') }}" alt="" />
                    </div>
                    <div class="right">
                        <div class="text--wrapper">
                            <p>Trouble reaching your future audience?</p>
                            <p>Trouble monitizing your platform?</p>
                            <p>All of your trouble is now gone!</p>
                        </div>

                        <h3 class="main--text">
                            The revival creators program makes becoming an online creator so
                            simple littertaly anyone can do it!
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        {{-- don't be him section area ends --}}



        {{-- how is this possible area starts --}}
        <section class="how--is--this--possible--area--wrapper section--gap">
            <div class="container">
                <h3 class="affiliate--common-title">How is this possible?</h3>
                <div class="how--is--this--possible--area--content">
                    <div class="text--content">
                        <div class="steps--list--wrapper">
                            <ul>
                                <li class="active">
                                    <p class="title">You create a channel</p>
                                    <p class="sub--title">
                                        In at laculis lorem. Praesent tempor dictum tellus ut
                                        molestie. Sed sed ullamcorper lorem, id faucibus odio.
                                    </p>
                                </li>
                                <li>
                                    <p class="title">
                                        We jump start it for the algorithm and get it ready for
                                        monetization.
                                    </p>
                                    <p class="sub--title">
                                        In at laculis lorem. Praesent tempor dictum tellus ut
                                        molestie. Sed sed ullamcorper lorem, id faucibus odio.
                                    </p>
                                </li>
                                <li>
                                    <p class="title">You create a channel</p>
                                    <p class="sub--title">
                                        In at laculis lorem. Praesent tempor dictum tellus ut
                                        molestie. Sed sed ullamcorper lorem, id faucibus odio.
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <div class="subtext">
                            You can finally quit the grind, and stop begging your neighbors
                            you don’t like to follow you, because that’s not even all! Once
                            your monetized, we will provide you with additional exclusive
                            opportunities to maximize your platforms income and reach, and
                            we will even reward you with free prizes!
                        </div>
                    </div>
                </div>
            </div>

            <div class="featrue--img--wrapper">
                <img src="{{ asset('frontend/images/how-is-this-possible-feature.png') }}" alt="" />
            </div>
        </section>
        {{-- how is this possible area ends --}}



        {{-- pricing for you area starts --}}
        <section class="pricing--for--you--area--wrapper section--gap">
            <h3 class="affiliate--common-title">Pricing for you</h3>
            <div class="container">
                <div class="pricing--for--you--area--content">
                    <div class="pricing--card">
                        <div class="top--part">
                            <div class="left">
                                <div class="pricing--tag">PREMIUM</div>
                                <p class="price">750</p>
                            </div>
                            <div class="right">
                                <p class="intro">What you get:</p>

                                <ul>
                                    <li>Youtube monitization</li>
                                    <li>Social media boost</li>
                                    <li>Free comic book</li>
                                    <li>T-shirt, Cap, Mug, Poster, Strikers</li>
                                    <li>A chance to get your own show here on Revival</li>
                                    <li>Affiliate link</li>
                                    <li>
                                        Exclusive early access to news, products, and
                                        announcements
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="/#join-email-section" class="join--now--btn"> Join Now </a>
                    </div>
                    <div class="pricing--card">
                        <div class="top--part">
                            <div class="left">
                                <div class="pricing--tag">FREE</div>
                                <p class="price">00</p>
                            </div>
                            <div class="right">
                                <p class="intro">What you get:</p>

                                <ul>
                                    <li>Affiliate link</li>
                                    <li>Free comic book</li>
                                    <li>Free comic book</li>
                                    <li>The first to get the latest updates and offers</li>
                                </ul>
                            </div>
                        </div>

                        <a href="/#join-email-section" class="join--now--btn"> Join Now </a>
                    </div>
                </div>
            </div>
        </section>
        {{-- pricing for you area ends --}}



        {{-- faq area starts --}}
        <section class="faq--area--wrapper section--gap">
            <div class="container">
                <div class="faq--area--content">
                    <h3 class="affiliate--common-title">FAQ</h3>

                    <div class="faq--list--wrapper">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- faq area ends --}}



        {{-- happy users area starts --}}
        <section class="happy--users--area--wrapper section--gap">
            <div class="container">
                <div class="happy--users--area--content">
                    <h3 class="affiliate--common-title">
                        Join with our many happy users
                    </h3>

                    <div class="happy--users--sliders--wrapper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($happyusers as $happyuser)
                                    <div class="swiper-slide">
                                        <div class="single--slide">
                                            <div class="left">
                                                <img src="{{ asset($happyuser->image ?? 'frontend/images/reviewer1.png') }}"
                                                    alt="{{ $happyuser->short_title }}" />
                                            </div>
                                            <div class="right">
                                                <div class="star--wrapper">
                                                    @for ($i = 0; $i < $happyuser->rating; $i++)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M23.3631 8.58308L15.9851 7.45608L12.6781 0.412078C12.4311 -0.113922 11.5681 -0.113922 11.3211 0.412078L8.0151 7.45608L0.637095 8.58308C0.500872 8.604 0.373049 8.66206 0.267662 8.75088C0.162274 8.83969 0.0833962 8.95583 0.0396894 9.08654C-0.0040174 9.21724 -0.0108633 9.35747 0.0199035 9.49181C0.0506702 9.62615 0.11786 9.74942 0.214095 9.84808L5.5741 15.3421L4.3071 23.1091C4.28447 23.248 4.30139 23.3905 4.35591 23.5202C4.41043 23.6499 4.50036 23.7617 4.61542 23.8428C4.73047 23.9238 4.86601 23.9709 5.00654 23.9785C5.14707 23.9862 5.28692 23.9541 5.4101 23.8861L12.0001 20.2441L18.5901 23.8871C18.7133 23.9551 18.8531 23.9872 18.9937 23.9795C19.1342 23.9719 19.2697 23.9248 19.3848 23.8438C19.4998 23.7627 19.5898 23.6509 19.6443 23.5212C19.6988 23.3915 19.7157 23.249 19.6931 23.1101L18.4261 15.3431L23.7861 9.84908C23.8826 9.75045 23.9501 9.6271 23.981 9.49262C24.0119 9.35813 24.0051 9.21772 23.9614 9.08683C23.9177 8.95595 23.8387 8.83967 23.7331 8.75079C23.6276 8.66191 23.4995 8.60388 23.3631 8.58308Z"
                                                                fill="#D9DA01" />
                                                        </svg>
                                                    @endfor
                                                </div>

                                                <div class="review--content--text">
                                                    <p class="main--title">
                                                        {{ $happyuser->short_title ?? 'Smooth App and Customer Support' }}
                                                    </p>

                                                    <p class="main--subtitle">
                                                        {!! $happyuser->description ??
                                                            'Popupular works very smoothly. And it is very simple
                                                                                                                                                                                                                                                                                                                                                                                                        and easy to use. I love it!Marco and the customer
                                                                                                                                                                                                                                                                                                                                                                                                        support are responsive, responsible, competent and
                                                                                                                                                                                                                                                                                                                                                                                                        to me very trustworthy.' !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- happy users area ends --}}
    </main>
@endsection
