<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Adaptive e learning system</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/website/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/website/css/flaticon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/website/css/themify-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/website/vendors/owl-carousel/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/website/vendors/nice-select/css/nice-select.css') }}"/>
    {{--    <!-- main css -->--}}
    <link rel="stylesheet" href="{{ asset('/website/css/style.css') }}"/>
</head>
<body>

<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="" action="">
                    <input
                        type="text"
                        class="form-control"
                        id="search_input"
                        placeholder="Search Here"
                    />
                    <button type="submit" class="btn"></button>
                    <span
                        class="ti-close"
                        id="close_search"
                        title="Close Search"
                    ></span>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"
                ><img src="website/img/logo.png" alt=""
                    /></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div
                    class="collapse navbar-collapse offset"
                    id="navbarSupportedContent"
                >

                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item @if(Request::path() == '' || Request::path() == '/') active @endif">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item @if(Request::path() == 'about' ) active @endif">
                            <a class="nav-link" href="/about">About</a>
                        </li>

                        <li class="nav-item @if(Request::path() == 'courses' ) active @endif">
                            <a class="nav-link" href="/courses">Courses</a>
                        </li>
                        <li class="nav-item @if(Request::path() == 'contact' ) active @endif">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link" id="login">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link search" id="register">
                                    Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link search" id="register">
                                    <i class="ti-user"></i> {{ auth()->user()->name }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>

                            <li class="hidden-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->


<main class="py-4">
    @yield('content')
</main>

<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">

        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                Adaptive E-Learning System
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-dribbble"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('website/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('website/js/popper.js') }}"></script>
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('website/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('website/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/js/owl-carousel-thumb.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('website/js/mail-script.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('website/js/gmaps.min.js') }}"></script>
<script src="{{ asset('website/js/theme.js') }}"></script>
</body>
</html>
