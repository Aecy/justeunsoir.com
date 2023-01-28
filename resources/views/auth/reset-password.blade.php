@extends('layouts.master', ['title' => "Réinitialiser mot de passe"])

@section('content')

    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Réinitialiser mot de passe</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">Réinitialiser mot de passe</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="login-section padding-tb">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Réinitialiser mot de passe</h3>
                <form class="account-form" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                        <input type="email" placeholder="Adresse e-mail" name="email" value="{{ old('email', $request->email) }}" autofocus>
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
                        <input type="password" placeholder="Mot de passe" name="password_confirmation">
                        @error("password_confirmation")
                            <div class="text-danger align-items-start pt-2" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="d-block lab-btn">
                            <span>Réinitialiser</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
