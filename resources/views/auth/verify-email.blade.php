@extends('layouts.master', ['title' => "Vérifier son adresse e-mail"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Vérifier votre adresse e-mail</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">Vérifier votre adresse e-mail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="login-section padding-tb">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Vérifier votre adresse e-mail</h3>
                <p>
                    Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous nous ferons un plaisir de vous en envoyer un autre.
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="text-success mb-4">
                        Un nouveau lien de vérification a été envoyé à l'adresse électronique que vous avez fournie lors de votre inscription.
                    </div>
                @endif

                <form method="post" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="lab-btn">Renvoyer la vérification</button>
                </form>
            </div>
        </div>
    </div>
@endsection
