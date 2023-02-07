@extends('layouts.master', ['title' => "Confirmer le mot de passe"])

@section('content')
  <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
    <div class="container">
      <div class="page-header-content">
        <div class="page-header-inner">
          <div class="page-title">
            <h2>Confirmer le mot de passe</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="login-section padding-tb">
    <div class="container">
      <div class="account-wrapper">
        <h3 class="title">Confirmer le mot de passe</h3>
        <p>L'endroit de cette application est sécurisé. Confirmez votre mot de passe avant de continuer.</p>
        <form class="account-form" method="POST" action="{{ route('password.confirm') }}">
          @csrf
          <div class="form-group">
            <input type="password" name="password" autofocus>
            @error("password")
              <div class="text-danger align-items-start" style="display: block">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="d-block lab-btn">
              <span>Confirmer</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
