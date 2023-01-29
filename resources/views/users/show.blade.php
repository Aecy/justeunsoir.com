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
                                                                <p class="info-name">Poids</p>
                                                                <p class="info-details">{{ $user->weight ?? "0" }} kg</p>
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
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="nav-security-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <article>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Modifier votre mot de passe</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('password.update') }}">
                                                            @csrf
                                                            @method('put')

                                                            <div class="mb-3">
                                                                <label for="current_password" class="pb-2">Mot de passe actuel</label>
                                                                <input type="password" name="current_password" class="form-control" autocomplete="current-password">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="pb-2">Nouveau mot de passe</label>
                                                                <input type="password" name="password" class="form-control" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password_confirmation" class="pb-2">Confirmer mot de passe</label>
                                                                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'password-updated')
                                                                    <p class="text-success">Votre mot de passe est mis à jour.</p>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Supprimer votre compte</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <p class="mb-4">
                                                            Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.
                                                        </p>
                                                        <form method="post" action="{{ route('profile.destroy') }}">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="mb-3">
                                                                <label for="password" class="pb-2">Mot de passe actuel</label>
                                                                <input type="password" name="password" class="form-control">
                                                                @error('password')
                                                                    <div class="invalid-feedback" style="display: block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="lab-btn">
                                                                <span>Supprimer le compte</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        <!-- Aside Part -->
                                        <div class="col-xl-4">
                                            <aside class="mt-5 mt-xl-0">
                                                <div class="widget like-member">
                                                    <div class="widget-inner">
                                                        <div class="widget-title">
                                                            <h5>Ces Membres Vous Likes</h5>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div class="row row-cols-3 row-cols-sm-auto g-3">
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/01.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/02.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/03.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/04.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/05.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/06.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/07.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/08.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/09.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="nav-friends-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <article>
                                                <div class="row gy-4 gx-3 justify-content-center">
                                                    <div class=" col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/01.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">jenifer Guido</a> </h6>
                                                                    <p>Active 1 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/02.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Andrea Guido</a> </h6>
                                                                    <p>Active 2 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/03.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Anna hawk</a> </h6>
                                                                    <p>Active 5 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/04.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Andreas Adam</a> </h6>
                                                                    <p>Active 4 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/05.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Alaina T</a> </h6>
                                                                    <p>Active 1 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/06.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Aron Smith</a> </h6>
                                                                    <p>Active 3 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/07.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Helen Gomz</a> </h6>
                                                                    <p>Active 3 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/08.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Andrez jr</a> </h6>
                                                                    <p>Active 5 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/09.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Ladiga Guido</a> </h6>
                                                                    <p>Active 5 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/10.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Andrea Guido</a> </h6>
                                                                    <p>Active 1 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/11.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Jene Aiko</a> </h6>
                                                                    <p>Active 4 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/12.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Jhon Cena</a> </h6>
                                                                    <p>Active 2 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/13.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Irfan Patel </a> </h6>
                                                                    <p>Active 5 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/14.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Hames Radregez</a> </h6>
                                                                    <p>Active 1 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/15.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Johan ben</a> </h6>
                                                                    <p>Active 2 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/16.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Johannes</a> </h6>
                                                                    <p>Active 6 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/17.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Helena Mind</a> </h6>
                                                                    <p>Active 4 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/18.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Virat Alba</a> </h6>
                                                                    <p>Active 3 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/19.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Afrin Nawr</a> </h6>
                                                                    <p>Active 5 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-6">
                                                        <div class="lab-item member-item style-1">
                                                            <div class="lab-inner">
                                                                <div class="lab-thumb">
                                                                    <img src="assets/images/member/20.jpg" alt="member-img">
                                                                </div>
                                                                <div class="lab-content">
                                                                    <h6><a href="#">Jason Roy</a> </h6>
                                                                    <p>Active 2 Day</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        <!-- Aside Part -->
                                        <div class="col-xl-4">
                                            <aside class="mt-5 mt-xl-0">
                                                <div class="widget search-widget">
                                                    <div class="widget-inner">
                                                        <div class="widget-title">
                                                            <h5>Filter Search Member</h5>
                                                        </div>
                                                        <div class="widget-content">
                                                            <p>Serious Dating With TuruLav Your Perfect
                                                                Match is Just a Click Away.</p>
                                                            <form action="/" class="banner-form">
                                                                <div class="gender">
                                                                    <div class="custom-select right w-100">
                                                                        <select class="">
                                                                            <option value="0">I am a </option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                            <option value="3">Others</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="person">
                                                                    <div class="custom-select right w-100">
                                                                        <select class="">
                                                                            <option value="0">Looking for</option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                            <option value="3">Others</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="age">
                                                                    <div class="right d-flex justify-content-between w-100">
                                                                        <div class="custom-select">
                                                                            <select>
                                                                                <option value="1">18</option>
                                                                                <option value="2">19</option>
                                                                                <option value="3">20</option>
                                                                                <option value="4">21</option>
                                                                                <option value="5">22</option>
                                                                                <option value="6">23</option>
                                                                                <option value="7">24</option>
                                                                                <option value="8">25</option>
                                                                                <option value="9">26</option>
                                                                                <option value="10">27</option>
                                                                                <option value="11">28</option>
                                                                                <option value="13">29</option>
                                                                                <option value="14">30</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="custom-select">
                                                                            <select>
                                                                                <option value="1">36</option>
                                                                                <option value="2">19</option>
                                                                                <option value="3">20</option>
                                                                                <option value="4">21</option>
                                                                                <option value="5">22</option>
                                                                                <option value="6">23</option>
                                                                                <option value="7">24</option>
                                                                                <option value="8">25</option>
                                                                                <option value="9">26</option>
                                                                                <option value="10">27</option>
                                                                                <option value="11">28</option>
                                                                                <option value="13">29</option>
                                                                                <option value="14">30</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="city">
                                                                    <div class="custom-select right w-100">
                                                                        <select class="">
                                                                            <option value="0">Choose Your Country
                                                                            </option>
                                                                            <option value="1">USA</option>
                                                                            <option value="2">UK</option>
                                                                            <option value="3">Spain</option>
                                                                            <option value="4">Brazil</option>
                                                                            <option value="5">France</option>
                                                                            <option value="6">Newzeland</option>
                                                                            <option value="7">Australia</option>
                                                                            <option value="8">Bangladesh</option>
                                                                            <option value="9">Turki</option>
                                                                            <option value="10">Chine</option>
                                                                            <option value="11">India</option>
                                                                            <option value="12">Canada</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="interest">
                                                                    <div class="custom-select right w-100">
                                                                        <select class="">
                                                                            <option value="0">Your Interests
                                                                            </option>
                                                                            <option value="1">Gaming</option>
                                                                            <option value="2">Fishing</option>
                                                                            <option value="3">Skydriving</option>
                                                                            <option value="4">Swimming</option>
                                                                            <option value="5">Racing</option>
                                                                            <option value="6">Hangout</option>
                                                                            <option value="7">Tranvelling</option>
                                                                            <option value="8">Camping</option>
                                                                            <option value="9">Touring</option>
                                                                            <option value="10">Acting</option>
                                                                            <option value="11">Dancing</option>
                                                                            <option value="12">Singing</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <button class="">Find Your Partner</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget like-member">
                                                    <div class="widget-inner">
                                                        <div class="widget-title">
                                                            <h5>you may like</h5>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div class="row row-cols-3 row-cols-sm-auto g-3">
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/01.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/02.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/03.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/04.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/05.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/06.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/07.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/08.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="image-thumb">
                                                                        <a href="#">
                                                                            <img src="assets/images/widget/09.jpg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget active-group">
                                                    <div class="widget-inner">
                                                        <div class="widget-title">
                                                            <h5>join the group</h5>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div class="group-item lab-item">
                                                                <div class="lab-inner d-flex flex-wrap align-items-center">
                                                                    <div class="lab-content w-100">
                                                                        <h6>Active Group A1</h6>
                                                                        <p>Colabors atively fabcate best breed and
                                                                            apcations through visionary</p>
                                                                        <ul class="img-stack d-flex">
                                                                            <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                                                            <li class="bg-theme">12+</li>
                                                                        </ul>
                                                                        <div class="test"> <a href="profile.html" class="lab-btn">
                                                                                <i class="icofont-users-alt-5"></i>
                                                                                View Group</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="group-item lab-item">
                                                                <div class="lab-inner d-flex flex-wrap align-items-center">
                                                                    <div class="lab-content w-100">
                                                                        <h6>Active Group A2</h6>
                                                                        <p>Colabors atively fabcate best breed and
                                                                            apcations through visionary</p>
                                                                        <ul class="img-stack d-flex">
                                                                            <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                                                            <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                                                            <li class="bg-theme">16+</li>
                                                                        </ul>
                                                                        <div class="test"> <a href="profile.html" class="lab-btn">
                                                                                <i class="icofont-users-alt-5"></i>
                                                                                View Group</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="nav-photos-tab">
                                <div class="photo-title text-center border-radius-2 bg-theme p-1 mb-4">
                                    <h3 class="mb-0">Toutes vos photos</h3>
                                </div>
                                <div class="row g-3 g-lg-4 justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                                    @foreach($user->getMedia() as $media)
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="{{ $media->getUrl() }}" alt="image" class="rounded">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="edit-photo custom-upload mt-4">
                                    <button class="btn-lab lab-btn">
                                        <i class="icofont-camera"></i> Ajouter une nouvelle photo
                                    </button>
                                    <form id="media" action="{{ route('account.store.media') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="media" onchange="event.preventDefault(); document.getElementById('media').submit()">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
