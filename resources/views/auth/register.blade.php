@extends('layouts.master', ['title' => "Se connecter"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>S'enregistrer</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">S'enregistrer</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="login-section padding-tb">
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">S'enregistrer</h3>
                <form class="account-form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" placeholder="Nom d'utilisateur" name="name" autofocus>
                        @error("name")
                            <div class="text-danger align-items-start" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Adresse e-mail" name="email">
                        @error("email")
                        <div class="text-danger align-items-start" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Mot de passe" name="password">
                        @error("password")
                        <div class="text-danger align-items-start" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirmer mot de passe" name="password_confirmation">
                        @error("password_confirmation")
                        <div class="text-danger align-items-start" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="d-block lab-btn">
                            <span>S'enregistrer gratuitement</span>
                        </button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block cate pt-10">
                        Vous êtes déjà membre ? <a href="{{ route('login') }}">Connectez-vous</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
