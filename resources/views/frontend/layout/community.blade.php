@extends('frontend.app')

@section('title')
    Community
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <style>
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: transparent;
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: 8px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-control:focus {
            color: white;
            background-color: transparent;
            border-color: rgb(102, 102, 102);
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(79, 79, 79, 0.25);
        }

        .btn-primary {
            background: transparent;
            border: 1px solid;
        }

        .btn-primary:hover {
            background: rgb(102, 102, 102);
            border: 1px solid;
        }

        .modal-title {
            color: #fff;
            font-family: var(--font-oswald);
            font-size: 26px;
            font-weight: 700;
            text-align: center;
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: black;
            background-color: #FDFE0D;
            border-color: #FDFE0D;
        }

        .dropify-wrapper {
            background-color: #0F0F00 !important;
            color: #fff !important;
            border-color: #DEE2E6;
        }

        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
    </style>
@endpush
@section('content')
    <main>
        <!-- banner area starts -->
        <section class="shop--banner--area--wrapper community--banner">
            <div class="container">
                <div class="shop--banner--area--content">
                    <h3 class="common--banner--title">Revival Community</h3>
                </div>
            </div>
        </section>
        <!-- banner area ends -->

        <!-- community total content area starts -->
        <section class="community--total--content--area--wrapper">
            <div class="container">
                <!-- search area -->
                <div class="community--search--area--wrapper" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <form action="#">
                        <!-- profile area -->
                        <div class="profile--wrapper">
                            <img src="{{ asset( Auth::user()->image ?? 'frontend/images/profile-avatar.png') }}" alt=""
                                style="border-radius: 50%;" />
                        </div>

                        <!-- input wrapper -->
                        <div class="input--wrapper">
                            <input type="text" placeholder="Let’s share what going on your mind..." readonly />
                        </div>
                    </form>
                </div>


                {{-- Modal for Post --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background: var(--bg--deep); color: white;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Let’s share what going on your mind...
                                </h5>
                            </div>
                            <form action="{{ route('post.store') }}" method="POST" id="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                <div class="modal-body">
                                    <div class="mb-4">
                                        <label for="title" class="col-form-label">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tag" class="col-form-label">Meta Tags:</label>
                                        <div class="tags-input-wrapper">
                                            <input type="text" class="form-control" name='tag' value=''
                                                autofocus>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text" name="message" style="height: 130px"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <input type="file" required
                                            class="dropify form-control form-control-md border-left-0 @error('image') is-invalid @enderror"
                                            name="image" id="image" value="{{ old('image', '') }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="upload--btn">
                                        <button type="button" class="btn--secondary" style="background: var(--bg--deep); border:none;"
                                            data-bs-dismiss="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="140" height="48"
                                                viewBox="0 0 140 48" fill="none">
                                                <path
                                                    d="M17.4295 0.5C5.95433 0.5 -2.01675 11.9233 1.943 22.6936L7.09013 36.6937C9.47696 43.1857 15.6597 47.5 22.5766 47.5H117.423C124.34 47.5 130.523 43.1857 132.91 36.6937L138.057 22.6937C142.017 11.9233 134.046 0.5 122.57 0.5H17.4295Z"
                                                    fill="#050505" stroke="url(#paint0_linear_4513_2315)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear_4513_2315" x1="-61.7234"
                                                        y1="87.25" x2="184.297" y2="56.07"
                                                        gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#FDFE0D" />
                                                        <stop offset="1" stop-color="white" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <p>Close</p>
                                        </button>
                                    </div>

                                    <button type="submit" class="btn--primary"
                                        style="background: var(--bg--deep); border:none;" form="post">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="140" height="49"
                                            viewBox="0 0 140 49" fill="none">
                                            <path
                                                d="M17.4295 1C5.95433 1 -2.01675 12.4233 1.943 23.1936L7.09013 37.1937C9.47696 43.6857 15.6597 48 22.5766 48H117.423C124.34 48 130.523 43.6857 132.91 37.1937L138.057 23.1937C142.017 12.4233 134.046 1 122.57 1H17.4295Z"
                                                fill="#FDFE0D" stroke="url(#paint0_linear_4513_1248)"></path>
                                            <defs>
                                                <linearGradient id="paint0_linear_4513_1248" x1="-61.7234" y1="87.75"
                                                    x2="184.297" y2="56.57" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FDFE0D"></stop>
                                                    <stop offset="1" stop-color="white"></stop>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                        <p>Upload</p>
                                    </button>
                                </div>
                            </from>
                        </div>
                    </div>
                </div>
                {{-- Modal for Post end here --}}


                <h3 class="post--heading">Recent Post</h3>

                <!-- main content -->
                <div class="community--main--content--wrapper">
                    <div class="recent--post--area--wrapper">
                        <div class="recent--post--area--list">
                            @foreach ($posts as $post)
                                <div class="single--post">
                                    <!-- img area -->
                                    <a href="{{ route('post.singlepost', ['slug' => $post->slug]) }}">
                                        <div class="img--wrapper">
                                            <img src="{{ asset($post->image ?? 'frontend/images/post--image.png') }}"
                                                alt="Post Image" />
                                        </div>

                                        <!-- content area -->
                                        <div class="content--area">
                                            <div class="top--part">
                                                <p class="post--title">{{ $post->title ?? '' }}</p>
                                                <div class="tag--wrapper">
                                                    @if (is_array($post->tag))
                                                        @foreach ($post->tag as $tag)
                                                            <p class="tags">#{{ $tag ?? '' }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                    </a>
                                    <div class="bottom--part">
                                        <div class="author--profile">
                                            <div class="author--img">
                                                <img src="{{ asset( Auth::user()->image ??'frontend/images/profile-avatar.png') }}"
                                                    alt="Author Image" style="border-radius: 50%;" />
                                            </div>
                                            <div class="author--info">
                                                <h4>{{ $post->user->name ?? '' }}</h4>
                                                <p>{{ $post->created_at->diffForHumans() ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- pagination area -->
                    <div class="pagination--wrapper">
                        {{ $posts->links() ?? '' }}
                    </div>
                </div>

                <div class="popular--tags--wrapper">
                    <h3 class="heading">Recent Tags</h3>
                    <ul class="tags--list">
                        @foreach ($recentTags as $tag)
                            <li>
                                <p class="tag">#{{ $tag ?? '' }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
        </section>
        <!-- community total content area ends -->
    </main>
@endsection


@push('script')
<script type="text/javascript" src="{{ asset('frontend/js/dropify.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endpush

