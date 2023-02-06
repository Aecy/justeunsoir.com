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
              <a href="{{ route('search.index') }}">Recherches</a>
            </li>
            <li>
              <a href="{{ route('reward.index') }}">Récompenses</a>
            </li>
            <li>
              <a href="{{ route('shop.index') }}">Tarifs</a>
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
                    <a href="{{ route('conversations.index') }}">
                      Mes messages
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
