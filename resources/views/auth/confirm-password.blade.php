@extends('layouts.master', ['title' => "Mot de passe oublié"])

@section('content')
  <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
    <div class="container">
      <div class="page-header-content">
        <div class="page-header-inner">
          <div class="page-title">
            <h2>Mot de passe oublié</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="login-section padding-tb">
    <div class="container">
      <div class="account-wrapper">
        <h3 class="title">Mot de passe oublié</h3>
        <p>Vous avez oublié votre mot de passe ? Aucun problème. Indiquez-nous simplement votre adresse électronique et
          nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un
          nouveau.</p>
        <form class="account-form" method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="form-group">
            <input type="email" placeholder="Adresse e-mail" name="email" value="{{ old('email') }}" autofocus>
            @error("email")
            <div class="text-danger align-items-start" style="display: block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="d-block lab-btn">
              <span>Réinitialisation du mot de passe</span>
            </button>
          </div>
        </form>
        @if(session('status'))
          <span class="mb-4 text-success">{{ session('status') }}</span>
        @endif
      </div>
    </div>
  </div>
@endsection

<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
  </div>

  <form method="POST" action="{{ route('password.confirm') }}">
  @csrf

  <!-- Password -->
    <div>
      <x-input-label for="password" :value="__('Password')"/>

      <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password"/>

      <x-input-error :messages="$errors->get('password')" class="mt-2"/>
    </div>

    <div class="flex justify-end mt-4">
      <x-primary-button>
        {{ __('Confirm') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
