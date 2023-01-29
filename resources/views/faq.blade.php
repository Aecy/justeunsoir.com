@extends('layouts.master', ['title' => "Foire aux questions"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Foire aux questions</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">Foire aux questions</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section padding-tb">
        <div class="container">
            <div class="section-header">
                <h2 class="theme-color">Foire aux questions</h2>
                <h4>Les questions fréquemment posées</h4>
            </div>
            <div class="section-wrapper mt-4">
                <div class="pricing-plan-wrapper">
                    <h5>Activer votre compte</h5>
                    <p>Vous devez vous inscrire et ensuite valider votre adresse e-mail pour profiter pleinement des fonctionnalités.</p>
                    <hr class="text-muted">
                    <h5>Oubli de mot de passe</h5>
                    <p>Si vous avez oublié votre mot de passe, pas de problème ! <a href="{{ route('password.request') }}">Cliquez ici</a></p>
                    <hr>
                    <h5>Supprimer votre compte</h5>
                    <p>Vous pouvez supprimer définitivement votre compte de {{ config('app.name') }}, aller sur "Mon Compte" puis "Sécurité" et supprimer votre compte en indiquant votre mot de passe actuel.</p>
                </div>
            </div>
        </div>

    </section>
@endsection
