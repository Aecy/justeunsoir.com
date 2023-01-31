@extends('layouts.master', ['title' => "Mon compte"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Mon compte</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">{{ $user->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-section padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">

                    @include('users.partials._profile')

                    <div class="profile-details">

                        @include('users.partials._nav', ['active' => "index"])

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane activity-page fade show active" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <article>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Informations basique</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <ul class="info-list">
                                                            <li>
                                                                <p class="info-name">Nom</p>
                                                                <p class="info-details">{{ $user->name }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Je suis un(e)</p>
                                                                <p class="info-details">{{ $user->gender }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">État civil</p>
                                                                <p class="info-details">{{ $user->martial ?? 'Non spécifié' }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Âge</p>
                                                                <p class="info-details">{{ $user->age }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Date de naissance</p>
                                                                <p class="info-details">{{ $user->birth_at ? $user->birth_at->format('d-m-Y') : 'Non spécifié' }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Ville</p>
                                                                <p class="info-details">{{ $user->address }}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>A propos de moi</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <p>{{ $user->about_me ?? "N'a encore rien écrit à propos de lui/elle." }}</p>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Recherche précise</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <p>{{ $user->looking_for ?? "N'a encore rien écrit sur ce qu'elle/il recherche ici." }}</p>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Style de vie</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <ul class="info-list">
                                                            <li>
                                                                <p class="info-name">Intérêts</p>
                                                                <p class="info-details">{{ $user->interest ?? "Non spécifié" }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Dépendance à la cigarette</p>
                                                                <p class="info-details">{{ $user->smoking ?? "Non spécifié" }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Dépendance à l'alcool</p>
                                                                <p class="info-details">{{ $user->drinking ?? 'Non spécifié' }}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="info-card">
                                                    <div class="info-card-title">
                                                        <h6>Information physique</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <ul class="info-list">
                                                            <li>
                                                                <p class="info-name">Taille</p>
                                                                <p class="info-details">{{ $user->height ?? "0" }} cm</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Morphologie</p>
                                                                <p class="info-details">{{ $user->morphologyName }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Couleur des cheveux</p>
                                                                <p class="info-details">{{ $user->hair_color ?? 'Non spécifié' }}</p>
                                                            </li>
                                                            <li>
                                                                <p class="info-name">Couleur des yeux</p>
                                                                <p class="info-details">{{ $user->eye_color ?? 'Non spécifié' }}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        <!-- Aside Part -->
                                        @include('users.partials._aside')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
