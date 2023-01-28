<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Titre' }} &middot; {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/x-icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

</head>
<body>
    <header class="header-section">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li>
                                <a href="{{ url('/') }}">Accueil</a>
                            </li>
                            <li>
                                <a href="#">Recherches</a>
                            </li>
                            <li>
                                <a href="#">Récompenses</a>
                            </li>
                            <li>
                                <a href="#">Tarifs</a>
                            </li>
                            @auth
                                <li>
                                    <a href="#" class="">
                                        <i class="icofont-user"></i> {{ auth()->user()->name }}
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{ route('dashboard') }}">
                                                Mon compte
                                            </a>
                                        </li>
                                        <li>
                                            <form class="d-none" method="POST" id="form-logout" action="{{ route('logout') }}">@csrf</form>
                                            <a onclick="event.preventDefault(); document.getElementById('form-logout').submit()" href="#">
                                                Se déconnecter
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="d-lg-none">
                                    <a href="{{ route('login') }}" class="">
                                        Se connecter
                                    </a>
                                </li>
                            @endauth
                        </ul>
                        @guest
                            <a href="{{ route('login') }}" class="login">
                                <i class="icofont-user"></i>
                                <span>Se connecter</span>
                            </a>
                            <a href="{{ route('register') }}" class="signup ms-2">
                                <i class="icofont-users"></i>
                                <span>S'enregistrer</span>
                            </a>
                        @endguest
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('partials._footer')

    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
</body>

</html>
