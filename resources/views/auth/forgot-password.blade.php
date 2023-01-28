@extends('layouts.master', ['title' => "Mot de passe oublié"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Mot de passe oublié</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">Mot de passe oublié</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="login-section padding-tb">
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">Mot de passe oublié</h3>
                <p>Vous avez oublié votre mot de passe ? Aucun problème. Indiquez-nous simplement votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.</p>
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
                <x-auth-session-status class="mb-4 text-green" :status="session('status')" />
            </div>
        </div>
    </div>
@endsection
