@extends('layouts.master', ['title' => "Se connecter"])

@section('content')

  <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
    <div class="container">
      <div class="page-header-content">
        <div class="page-header-inner">
          <div class="page-title">
            <h2>Se connecter</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="login-section padding-tb">
    <div class=" container">
      <div class="account-wrapper">
        <h3 class="title">Se connecter</h3>
        <form class="account-form" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <input type="email" placeholder="Adresse e-mail" name="email" autofocus>
            @error("email")
            <div class="text-danger align-items-start pt-2" style="display: block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" placeholder="Mot de passe" name="password">
            @error("password")
            <div class="text-danger align-items-start pt-2" style="display: block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <div class="d-flex justify-content-between flex-wrap pt-sm-2">
              <div class="checkgroup">
                <input type="checkbox" name="remember" id="remember_me">
                <label for="remember_me">Se souvenir de moi</label>
              </div>
              @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  Mot de passe oublié ?
                </a>
              @endif
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="d-block lab-btn">
              <span>Se connecter</span>
            </button>
          </div>
        </form>
        <div class="account-bottom">
          <span class="d-block cate pt-10">Vous n'avez pas de compte ?
            <a href="{{ route('register') }}">
              Enregistrez-vous gratuitement
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
@endsection
