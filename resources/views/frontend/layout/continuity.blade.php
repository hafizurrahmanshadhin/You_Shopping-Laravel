@extends('frontend.app')

@section('title')
    Continuity
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
        {{-- main video area --}}
        <section class="continuity--banner--area--wrapper">
            <video loop muted autoplay src="{{ asset('frontend/videos/continuity-banner.mp4') }}"></video>
        </section>
        {{-- main video area --}}



        {{-- hero area starts --}}
        <section class="continuity--hero--area--wrapper section--gap">
            <div class="container">
                <div class="continuity--hero--area--content">
                    <div class="text--wrapper">
                        <p>MISS ORIGINAL IDEAS IN MOVIES?</p>
                        <p>MISS FRIENDLY COMMUNITIES IN FANDOMS?</p>
                        <p>
                            MISS MOVIES THAT YOU CAN LOSE YOURSELF IN AND THAT YOU CAN
                            THEORISE WITH ESCITEMENT ABOUT?
                        </p>
                    </div>
                    <h3 class="hero--text">THE REVIVAL CONTINUITY DOES A LOT MORE THAN JUST THAT.</h3>
                </div>
            </div>
        </section>
        {{-- hero area ends --}}



        {{-- about continuity area starts --}}
        <section class="about--continuity--area--wrapper section--gap">
            <div class="container">
                <div class="about--continuity--area--content">
                    <div class="left">
                        <img src="{{ asset('frontend/images/about-continuity.png') }}" alt="" />
                    </div>
                    <div class="right">
                        <h3 class="hero--text">ABOUT CONTINUITY</h3>
                        <p class="sub--text">
                            The emotional, gritty, and action packed world you’ve been
                            dreaming of is finally hear. This is not just another cinematic
                            universe. The revival continuity is made up of all original
                            characters that were created separately to maximize their
                            creativity quality. We let all of these separate storylines
                            naturally blend together to form one ground breaking story. What
                            happens in a movie, show, or book will eventually impact
                            everyone, and in the same time, every product is complete
                            without you having to catch up on anything.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- about continuity area ends --}}



        {{-- revival saga area starts --}}
        <section class="revival--saga--banner--area"></section>
        {{-- revival saga area ends --}}



        {{-- upcoming area starts --}}
        <section class="upcoming--area--wrapper section--gap" style="cursor: pointer;">
            <h3 class="hero--text">upcoming Project</h3>

            <div class="container">
                <!-- slider wrapper -->
                <div class="upcoming--project--slider--wrapper">

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($upcomingProjects as $upcomingProject)
                                <div class="swiper-slide">
                                    <div class="single--slide">
                                        <img src="{{ asset($upcomingProject->image) }}" alt />

                                        <div class="text--wrapper">
                                            <p class="title">{{ $upcomingProject->title ?? '' }}</p>
                                            <p class="date">Streaming on {{ $upcomingProject->releas_date ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="slider">

                    </div>
                </div>
            </div>
        </section>
        {{-- upcoming area ends --}}



        {{-- no gimmick section area starts --}}
        <section class="no--gimmicks--area--wrapper section--gap">
            <div class="container">
                <div class="no--gimmicks--area--content">
                    <div class="single--card">
                        <p class="title">
                            WHAT SETS US APART FROM THE OTHER MILLIONS OF CINEMATIC
                            UNIVERSES?
                        </p>
                        <ul>
                            <li>
                                We have the beginning middle and end planned out for every
                                character and every story.
                            </li>
                            <li>
                                We do not have a political agenda, and we do not play identity
                                politics.
                            </li>
                            <li>
                                Our number one priority is to blow your mind every single
                                time.
                            </li>
                        </ul>
                    </div>
                    <div class="single--card">
                        <p class="title">NO GIMICKS:</p>
                        <ul>
                            <li>There are real human steaks.</li>
                            <li>Dead characters stay dead.</li>
                            <li>There is no multiverse or time travel.</li>
                            <li>
                                We do not rely on nostalgia since we are all new and all
                                original.
                            </li>
                            <li>
                                The revival continuity is made by it’s creators, so we
                                understand and respect the source material.
                            </li>
                            <li>
                                We do not use a copy paste formula. Each installment is risky
                                and unique.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        {{-- no gimmick section area ends --}}



        {{-- touch history area style starts --}}
        <section class="touch--history--area--wrapper">
            <div class="container">
                <div class="touch--history--area--content">
                    <div class="left">
                        <img src="{{ asset($ProductPromotions->image ?? 'frontend/images/touch-history.png') }}"
                            alt="{{ $ProductPromotions->title ?? '' }}" />
                    </div>
                    <div class="right">
                        <h3 class="hero--text">{{ $ProductPromotions->title ?? 'TOUCH HISTORY IN THE MAKING' }}</h3>

                        <p class="sub--text">
                            {{ $ProductPromotions->short_description ?? 'STEP INTO THE WORLD OF THE REVIVAL SAGA WITH THE LONG AWAITED ROGUE ASSASSIN: A SPARK OF REVIVAL AND CHOOSE BETWEEN TWO' }}
                        </p>

                        <a href="{{route('preoder.index')}}" class="btn--primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="275" height="66" viewBox="0 0 275 66"
                                fill="none">
                                <path
                                    d="M17.1847 0.5C4.84563 0.5 -3.12762 13.5486 2.50229 24.5284L18.9103 56.5284C21.7343 62.0361 27.4032 65.5 33.5927 65.5H241.407C247.597 65.5 253.266 62.0361 256.09 56.5284L272.498 24.5284C278.128 13.5486 270.154 0.5 257.815 0.5H17.1847Z"
                                    fill="#FDFE0D" stroke="url(#paint0_linear_4513_1690)" />
                                <defs>
                                    <linearGradient id="paint0_linear_4513_1690" x1="-118.096" y1="121"
                                        x2="352.255" y2="37.8629" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FDFE0D" />
                                        <stop offset="1" stop-color="white" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <p>LEARN MORE</p>
                        </a>
                    </div>

                    <div class="limited--offer--text">LIMITED TIME OFFER</div>
                </div>
            </div>
        </section>
        {{-- touch history area style ends --}}
    </main>
@endsection
