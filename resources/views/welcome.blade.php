@extends('layouts.master', ['title' => 'Accueil'])

@section('content')
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
                  <form action="{{ route('search.index') }}" method="get" class="banner-form">
                    <div class="gender">
                      <label for="gender" class="left">Je suis un(e)</label>
                      <div class="custom-select right">
                        <select name="gender" id="gender" class="">
                          <option value="" disabled selected>Sélectionner votre genre</option>
                          <option value="H">Homme</option>
                          <option value="A">Femme</option>
                          <option value="F">Non-binaire</option>
                        </select>
                      </div>
                    </div>
                    <div class="person">
                      <label for="looking" class="left">Je recherche</label>
                      <div class="custom-select right">
                        <select name="looking" id="looking" class="">
                          <option value="" disabled selected>Sélectionner votre recherche</option>
                          <option value="H">Homme</option>
                          <option value="F">Femme</option>
                          <option value="A">Autre</option>
                        </select>
                      </div>
                    </div>
                    <div class="age">
                      <label for="start_age" class="left">Âgé entre</label>
                      <div class="right d-flex justify-content-between">
                        <div class="custom-select">
                          <select name="start_age" id="start_age">
                            @foreach(range(18, 99) as $nub)
                              <option value="{{ $nub }}">{{ $nub }}</option>
                            @endforeach
                          </select>
                        </div>
                        <span class="d-flex align-items-center me-2 ms-2">et</span>
                        <div class="custom-select">
                          <select name="end_age" id="end_age">
                            @foreach(range(18, 99) as $nub)
                              <option value="{{ $nub }}">{{ $nub }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="city">
                      <label for="address" class="left">Dans la ville</label>
                      <input class="right" type="text" id="address" name="address" placeholder="Entrer votre ville...">
                    </div>
                    <button type="submit" class="">Trouver un partenaire</button>
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
          @foreach($users->slice(0, 6) as $user)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
              <div class="lab-item member-item style-1">
                <div class="lab-inner">
                  <div class="lab-thumb">
                    <img src="{{ $user->avatar_url }}" alt="member-img">
                  </div>
                  <div class="lab-content">
                    <h6>
                      @include('partials._user-online', ['userId' => $user->id])
                      <a href="{{ route('users.show', $user) }}">
                        {{ $user->name }}
                      </a>
                    </h6>
                    <p>Inscrit {{ $user->created_at->diffForHumans() }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="member-button-group d-flex flex-wrap justify-content-center">
          <a href="{{ route('register') }}" class="lab-btn">
            <i class="icofont-users"></i>
            <span>Rejoignez-nous, gratuitement</span>
          </a>
          <a href="{{ route('login') }}" class="lab-btn">
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
                  <img src="{{ asset('assets/images/about/01.png') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h2 class="counter">{{ $users->count() }}</h2>
                  <p>Membre(s) au total</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="lab-item about-item">
              <div class="lab-inner text-center">
                <div class="lab-thumb">
                  <img src="{{ asset('assets/images/about/02.png') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h2 class="counter">{{ $onlineUsers->count() }}</h2>
                  <p>Membre(s) connecté(s)</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="lab-item about-item">
              <div class="lab-inner text-center">
                <div class="lab-thumb">
                  <img src="{{ asset('assets/images/about/03.png') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h2 class="counter">{{ $onlineMens->count() }}</h2>
                  <p>Homme(s) connecté(s)</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="lab-item about-item">
              <div class="lab-inner text-center">
                <div class="lab-thumb">
                  <img src="{{ asset('assets/images/about/04.png') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h2 class="counter">{{ $onlineWomans->count() }}</h2>
                  <p>Femme(s) connecté(s)</p>
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
                      <span>Step</span>
                      <p>1</p>
                    </div>
                  </div>
                </div>
                <div class="lab-content">
                  <h4>Créer votre compte</h4>
                  <p>
                    En créant votre compte, vous accédez au reste des fonctionnalités de {{ config('app.name') }} !
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
                      <span>Step</span>
                      <p>2</p>
                    </div>
                  </div>
                </div>
                <div class="lab-content">
                  <h4>Trouver des matchs</h4>
                  <p>
                    Commencez à trouver vos matchs et commencer à discuter avec ces derniers.
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
                      <span>Step</span>
                      <p>3</p>
                    </div>
                  </div>
                </div>
                <div class="lab-content">
                  <h4>Commencer à rencontrer</h4>
                  <p>
                    Une fois inscrit, l'e-mail vérifié. Vous serez apte à enfin commencer.
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
                  <img src="{{ asset('assets/illustrations/social.svg') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h4>
                    <a href="#">
                      Ni engagement, ni attache.
                    </a>
                  </h4>
                  <p>
                    La possibilité de rencontrer des personnes qui cherchent la même chose que vous sans engagements, ni
                    attaches.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="story-item lab-item">
              <div class="lab-inner">
                <div class="lab-thumb">
                  <img src="{{ asset('assets/illustrations/community.svg') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h4>
                    <a href="#">Mêmes envies & intérêts</a>
                  </h4>
                  <p>
                    Une communauté de personnes libres et ouvertes d'esprit qui partagent les mêmes envies et les mêmes
                    intérêts.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="story-item lab-item">
              <div class="lab-inner">
                <div class="lab-thumb">
                  <img src="{{ asset('assets/illustrations/pleasure.svg') }}" alt="img">
                </div>
                <div class="lab-content">
                  <h4>
                    <a href="#">Vivre des moments</a>
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
          @foreach($users->slice(0, 10) as $user)
            <div class="grid-member filter-item {{ $user->gender === 'F' ? 'girl' : 'boy' }}">
              <div class="lab-item member-item style-1 style-2">
                <div class="lab-inner">
                  <div class="lab-thumb">
                    <img src="{{ $user->avatar_url }}" alt="member-img">
                  </div>
                  <div class="lab-content">
                    <h6>
                      @include('partials._user-online', ['userId' => $user->id])
                      <a href="{{ route('users.show', $user) }}">
                        {{ $user->name }}
                      </a>
                    </h6>
                    <p>{{ $user->gender === 'F' ? "Inscrite" : 'Inscrit' }} {{ $user->created_at->diffForHumans() }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
          <p>Découvrez une nouvelle façon de rencontrer des personnes qui partagent vos intérêts et vos envies,
            téléchargez dès maintenant notre application de rencontre exclusive.</p>
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
          <img src="{{ asset('assets/illustrations/phone.svg') }}" alt="mbl-view">
        </div>
      </div>
    </div>
  </section>
@endsection
