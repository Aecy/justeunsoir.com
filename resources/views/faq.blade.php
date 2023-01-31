@extends('layouts.master', ['title' => "Foire aux questions"])

@section('content')
    <section class="pricing-section padding-tb">
        <div class="container">
            <div class="section-header">
                <h2 class="theme-color">Foire aux questions</h2>
                <h4>Les questions fréquemment posées</h4>
            </div>
            <div class="section-wrapper mt-4">
                <div class="pricing-plan-wrapper">
                    <h5>S'inscrire sur {{ config('app.name') }}</h5>
                    <p>
                        Vous pouvez vous inscrire uniquement si vous avez plus de 18 ans ; dans le cas contraire. Nous vous invitons à passer votre chemin.
                    </p>
                    <hr class="text-muted">
                    <h5>Activer votre compte</h5>
                    <p>Vous devez vous inscrire et ensuite valider votre adresse e-mail pour profiter pleinement des fonctionnalités.</p>
                    <hr class="text-muted">
                    <h5>Oubli de mot de passe</h5>
                    <p>Si vous avez oublié votre mot de passe, pas de problème ! <a href="{{ route('password.request') }}">Cliquez ici</a></p>
                    <hr class="text-muted">
                    <h5>Supprimer votre compte</h5>
                    <p>Vous pouvez supprimer définitivement votre compte de {{ config('app.name') }}, aller sur "Mon Compte" puis "Sécurité" et supprimer votre compte en indiquant votre mot de passe actuel.</p>
                    <hr class="text-muted">
                    <h5>Concernant vos photos</h5>
                    <p>
                        Vos photos sont uniquement disponible sur site, aucun membre a le droit de prendre votre photo pour l'utilisé à des fins personnelles ou commerciales.
                        <br>Les photos dénudées sont acceptées uniquement si vous avez plus de 18 ans.
                    </p>
                    <hr class="text-muted">
                </div>
            </div>
        </div>

    </section>
@endsection
