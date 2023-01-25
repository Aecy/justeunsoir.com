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
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

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
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <a href="#0">Features</a>
                            <ul class="submenu">
                                <li><a href="members.html">All Members</a></li>
                                <li><a href="profile.html">Member Profile</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                                <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                <li><a href="404.html">404 Page</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="active-group.html">Community</a>
                        </li>
                        <li>
                            <a href="#0">Blog</a>
                            <ul class="submenu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                    <a href="login.html" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a>
                    <a href="signup.html" class="signup"><i class="icofont-users"></i> <span>SIGN UP</span> </a>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="ellepsis-bar d-lg-none">
                        <i class="icofont-info-square"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="banner-section">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <div class="intro-form">
                            <div class="intro-form-inner">
                                <h3>{{ config('app.name') }}</h3>
                                <p>Rencontrer sans engagement, ni attache dans la confidentialité la plus totale.</p>
                                <form action="/" class="banner-form">
                                    <div class="gender">
                                        <label for="gender" class="left">Je suis un(e)</label>
                                        <div class="custom-select right">
                                            <select name="gender" id="gender" class="">
                                                <option value="0" disabled selected>Sélectionner votre genre</option>
                                                <option value="1">Homme</option>
                                                <option value="2">Femme</option>
                                                <option value="3">Non-binaire</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="person">
                                        <label for="gender-two" class="left">Je recherche</label>
                                        <div class="custom-select right">
                                            <select name="gender" id="gender-two" class="">
                                                <option value="0" disabled selected>Sélectionner votre recherche</option>
                                                <option value="1">Homme</option>
                                                <option value="2">Femme</option>
                                                <option value="3">Autre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="age">
                                        <label for="age" class="left">Âgé entre</label>
                                        <div class="right d-flex justify-content-between">
                                            <div class="custom-select">
                                                <select name="age-start" id="age">
                                                    <option value="1">18</option>
                                                    <option value="2">19</option>
                                                    <option value="3">20</option>
                                                    <option value="4">21</option>
                                                    <option value="5">22</option>
                                                    <option value="6">23</option>
                                                    <option value="7">24</option>
                                                    <option value="8">25</option>
                                                    <option value="9">26</option>
                                                    <option value="10">27</option>
                                                    <option value="11">28</option>
                                                    <option value="13">29</option>
                                                    <option value="14">30</option>
                                                </select>
                                            </div>
                                            <span class="d-flex align-items-center me-2 ms-2">et</span>
                                            <div class="custom-select">
                                                <select name="age-end" id="age-two">
                                                    <option value="1">18+</option>
                                                    <option value="2">19</option>
                                                    <option value="3">20</option>
                                                    <option value="4">21</option>
                                                    <option value="5">22</option>
                                                    <option value="6">23</option>
                                                    <option value="7">24</option>
                                                    <option value="8">25</option>
                                                    <option value="9">26</option>
                                                    <option value="10">27</option>
                                                    <option value="11">28</option>
                                                    <option value="13">29</option>
                                                    <option value="14">30</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="city">
                                        <label for="city" class="left">Dans la ville</label>
                                        <input class="right" type="text" id="city" placeholder="Entrer votre ville...">
                                    </div>
                                    <button class="">Trouver un partenaire</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-thumb">
                        <img src="{{ asset('assets/images/banner/01.svg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-shapes">
        <img src="{{ asset('assets/images/banner/banner-shapes/01.png') }}" alt="shape" class="banner-shape shape-1">
        <img src="{{ asset('assets/images/banner/banner-shapes/02.png') }}" alt="shape" class="banner-shape shape-2">
        <img src="{{ asset('assets/images/banner/banner-shapes/03.png') }}" alt="shape" class="banner-shape shape-3">
        <img src="{{ asset('assets/images/banner/banner-shapes/04.png') }}" alt="shape" class="banner-shape shape-4">
        <img src="{{ asset('assets/images/banner/banner-shapes/05.png') }}" alt="shape" class="banner-shape shape-5">
        <img src="{{ asset('assets/images/banner/banner-shapes/06.png') }}" alt="shape" class="banner-shape shape-6">
        <img src="{{ asset('assets/images/banner/banner-shapes/07.png') }}" alt="shape" class="banner-shape shape-7">
        <img src="{{ asset('assets/images/banner/banner-shapes/08.png') }}" alt="shape" class="banner-shape shape-8">
    </div>
</section>

<section class="member-section padding-tb">
    <div class="container">
        <div class="section-header">
            <h4 class="theme-color">Rencontrez d'autres membres !</h4>
            <h2>Nos six derniers membres</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center g-3 g-md-4">
                @foreach(range(1, 6) as $member)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="{{ asset('assets/images/member/0'.$member.'.jpg') }}" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6>
                                        <a href="#">
                                            Membre fictif
                                        </a>
                                    </h6>
                                    <p>Inactive depuis 1 jour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="member-button-group d-flex flex-wrap justify-content-center">
                <a href="#" class="lab-btn">
                    <i class="icofont-users"></i>
                    <span>Rejoignez-nous, gratuitement</span>
                </a>
                <a href="#" class="lab-btn">
                    <i class="icofont-play-alt-1"></i>
                    <span>Connectez-vous dès maintenant</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="about-section padding-tb bg-img">
    <div class="container">
        <div class="section-header">
            <h4>A propos de {{ config('app.name') }}</h4>
            <h2>Ici, tout commence par un rendez-vous</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center g-4">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="lab-item about-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <img src="assets/images/about/01.png" alt="img">
                            </div>
                            <div class="lab-content">
                                <h2 class="counter">10,284</h2>
                                <p>Membres au total</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="lab-item about-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <img src="assets/images/about/02.png" alt="img">
                            </div>
                            <div class="lab-content">
                                <h2 class="counter">8,960</h2>
                                <p>Membres connectés</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="lab-item about-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <img src="assets/images/about/03.png" alt="img">
                            </div>
                            <div class="lab-content">
                                <h2 class="counter">3,247</h2>
                                <p>Hommes connectés</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="lab-item about-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <img src="assets/images/about/04.png" alt="img">
                            </div>
                            <div class="lab-content">
                                <h2 class="counter">5,713</h2>
                                <p>Femmes connectés</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="work-section padding-tb">
    <div class="container">
        <div class="section-header">
            <h4 class="theme-color">Comment ça fonctionne ?</h4>
            <h2>Vous n'êtes qu'à trois étapes avant de passer un bon moment.</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center g-5">
                <div class="col-lg-4 col-sm-6 col-12 px-4">
                    <div class="lab-item work-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <div class="thumb-inner">
                                    <img src="{{ asset('assets/images/work/01.png') }}" alt="work-img">
                                    <div class="step">
                                        <span>Étape</span>
                                        <p>1</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lab-content">
                                <h4>Créer votre profil</h4>
                                <p>
                                    En créant votre profil, vous accédez au reste des fonctionnalités de {{ config('app.name') }} !
                                    Vous n'êtes pas au bout de vos surprises.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 px-4">
                    <div class="lab-item work-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <div class="thumb-inner">
                                    <img src="{{ asset('assets/images/work/02.png') }}" alt="work-img">
                                    <div class="step">
                                        <span>Étape</span>
                                        <p>2</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lab-content">
                                <h4>Trouver des matchs</h4>
                                <p>
                                    Commencez à trouver des matchs et discutez avec ces derniers et arrangez-vous comme vous le sentez pour... Vous savez...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 px-4">
                    <div class="lab-item work-item">
                        <div class="lab-inner text-center">
                            <div class="lab-thumb">
                                <div class="thumb-inner">
                                    <img src="{{ asset('assets/images/work/03.png') }}" alt="work-img">
                                    <div class="step">
                                        <span>Étape</span>
                                        <p>3</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lab-content">
                                <h4>Commencer à rencontrer</h4>
                                <p>
                                    Pour cela il va falloir s'inscrire.
                                    Alors qu'attendez-vous ? Rejoignez {{ config('app.name') }} dès maintenant !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="story-section padding-tb bg-img">
    <div class=" container">
        <div class="section-header">
            <h4>Pas de prise de tête, qu'un rapport d'un soir</h4>
            <h2>C'est {{ config('app.name') }}, soyez vous-mêmes</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="story-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="{{ asset('assets/images/story/01.jpg') }}" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>
                                    <a href="#">
                                        Ni engagement, ni attache.
                                    </a>
                                </h4>
                                <p>
                                    La possibilité de rencontrer des personnes qui cherchent la même chose que vous sans engagements, ni attaches.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="story-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/story/02.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>
                                    <a href="blog-single.html">
                                        Mêmes envies & intérêts
                                    </a>
                                </h4>
                                <p>
                                    Une communauté de personnes libres et ouvertes d'esprit qui partagent les mêmes envies et les mêmes intérêts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="story-item lab-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/story/03.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>
                                    <a href="blog-single.html">
                                        Vivre des moments
                                    </a>
                                </h4>
                                <p>
                                    La possibilité de vivre des moments inoubliables sans aucune pression ni engagement à long terme.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="top-member-section padding-tb">
    <div class="container">
        <div class="section-header">
            <h4 class="theme-color">Nos dernières inscriptions</h4>
            <h2>Voyez qui sont nos derniers utilisateurs</h2>
        </div>
        <div class="section-wrapper">
            <ul class="button-group filters-button-group w-100 d-flex flex-wrap justify-content-center">
                <li class="button is-checked filter-btn" data-filter="*">
                    <i class="icofont-heart-alt"></i> Montrer tous
                </li>
                <li class="button filter-btn" data-filter=".girl">
                    <i class="icofont-girl"></i> Juste les femmes
                </li>
                <li class="button filter-btn" data-filter=".boy">
                    <i class="icofont-hotel-boy"></i> Juste les hommes
                </li>
            </ul>

            <div class="grid-memberlist">
                <div class="grid-member filter-item girl">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/01.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Johanna</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item girl">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/03.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Selinae</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item boy">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/02.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Andrea Guido</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item boy">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/04.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Rocky deo</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item girl">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/05.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Jhon doe</a> </h6>
                                <p>Active 5 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item boy">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/06.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Angelina</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item girl">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/07.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Andrea Guido</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item boy">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/08.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Jene Aiko</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item girl">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/09.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Anna haek</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-member filter-item boy">
                    <div class="lab-item member-item style-1 style-2">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img src="assets/images/member/10.jpg" alt="member-img">
                            </div>
                            <div class="lab-content">
                                <h6><a href="profile.html">Andrean Puido</a> </h6>
                                <p>Active 1 Day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="group-section padding-tb bg-img">
    <div class="container">
        <div class="section-header">
            <h4>Recently Active Groups</h4>
            <h2>Turulav 4 Best Active Group</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4">
                <div class="col-xl-6 col-12">
                    <div class="group-item lab-item">
                        <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                            <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                <img src="assets/images/group/01.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>Active Group A1</h4>
                                <p>Colabors atively fabcate best breed and apcations through visionary value</p>
                                <ul class="img-stack d-flex">
                                    <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                    <li class="bg-theme">12+</li>
                                </ul>
                                <div class="test">
                                    <a href="active-group.html" class="lab-btn">
                                        <i class="icofont-users-alt-5"></i> View Group
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="group-item lab-item">
                        <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                            <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                <img src="assets/images/group/02.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>Active Group A2</h4>
                                <p>Colabors atively fabcate best breed and
                                    apcations through visionary value </p>
                                <ul class="img-stack d-flex">
                                    <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                    <li class="bg-theme">12+</li>
                                </ul>
                                <div class="test"> <a href="active-group.html" class="lab-btn"> <i
                                            class="icofont-users-alt-5"></i>View Group</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="group-item lab-item">
                        <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                            <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                <img src="assets/images/group/03.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>Active Group A3</h4>
                                <p>Colabors atively fabcate best breed and
                                    apcations through visionary value </p>
                                <ul class="img-stack d-flex">
                                    <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                    <li class="bg-theme">12+</li>
                                </ul>
                                <div class="test"> <a href="active-group.html" class="lab-btn"> <i
                                            class="icofont-users-alt-5"></i>View Group</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="group-item lab-item">
                        <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                            <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                <img src="assets/images/group/04.jpg" alt="img">
                            </div>
                            <div class="lab-content">
                                <h4>Active Group A4</h4>
                                <p>Colabors atively fabcate best breed and
                                    apcations through visionary value </p>
                                <ul class="img-stack d-flex">
                                    <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                    <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                    <li class="bg-theme">12+</li>
                                </ul>
                                <div class="test"> <a href="active-group.html" class="lab-btn"> <i
                                            class="icofont-users-alt-5"></i>View Group</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="clints-section padding-tb">
    <div class="container">
        <div class="section-header">
            <h4 class="theme-color">Qu'est-ce que nos utilisateurs disent ?</h4>
            <h2>Les dernières nouvelles de nos utilisateurs</h2>
        </div>
        <div class="section-wrapper">
            <div class="clients">
                <div class="client-list">
                    <div class="client-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, porro?</p>
                        <div class="client-info">
                            <div class="name-desi">
                                <h6>Marine Fourmwa</h6>
                                <span>Utilisatrice fréquente</span>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                    <li><i class="icofont-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="client-thumb">
                        <img src="assets/images/group/group-mem/02.png" alt="lab-clients">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="app-section bg-theme">
    <div class="container">
        <div class="section-wrapper padding-tb">
            <div class="app-content">
                <h4>Télécharger l'application</h4>
                <h2>Bientôt disponible...</h2>
                <p>Découvrez une nouvelle façon de rencontrer des personnes qui partagent vos intérêts et vos envies, téléchargez dès maintenant notre application de rencontre exclusive.</p>
                <ul class="app-download d-flex flex-wrap">
                    <li>
                        <a href="#" class="d-flex flex-wrap align-items-center">
                            <div class="app-thumb">
                                <img src="{{ asset('assets/images/app/apple.png') }}" alt="apple">
                            </div>
                            <div class="app-content">
                                <p>Bientôt disponible sur</p>
                                <h4>App Store</h4>
                            </div>
                        </a>
                    </li>
                    <li class="d-inline-block">
                        <a href="#" class="d-flex flex-wrap align-items-center">
                            <div class="app-thumb">
                                <img src="{{ asset('assets/images/app/playstore.png') }}" alt="playstore">
                            </div>
                            <div class="app-content">
                                <p>Bientôt disponible sur</p>
                                <h4>Google Play</h4>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="mobile-app">
                <img src="assets/images/app/mobile-view.png" alt="mbl-view">
            </div>
        </div>
    </div>
</section>

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
