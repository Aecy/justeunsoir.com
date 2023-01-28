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
                        <li class="active">{{ auth()->user()->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-section padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">
                    <div class="profile-item">
                        <div class="profile-cover">
                            <img src="{{ asset('assets/images/profile/cover.jpg') }}" alt="cover-pic">
                            <div class="edit-photo custom-upload">
                                <div class="file-btn"><i class="icofont-camera"></i>Modifier votre couverture</div>
                                <input type="file">
                            </div>
                        </div>
                        <div class="profile-information">
                            <div class="profile-pic">
                                <img src="{{ auth()->user()->avatar_url }}" alt="DP">
                                <div class="custom-upload">
                                    <div class="file-btn">
                                        <span class="d-none d-lg-inline-block">
                                            <i class="icofont-camera"></i> Modifier votre photo
                                        </span>
                                        <span class="d-lg-none mr-0">
                                            <i class="icofont-plus"></i>
                                        </span>
                                    </div>
                                    <form id="avatar-form" method="post" action="{{ route('account.upload.avatar') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="avatar" onchange="event.preventDefault(); document.getElementById('avatar-form').submit()">
                                    </form>
                                </div>
                            </div>
                            <div class="profile-name">
                                <h4>
                                    @if(Cache::has('users_online-' . auth()->user()->id))
                                        <i class="icofont-ui-press text-success text-sm circle pulse"></i>
                                    @else
                                        <i class="icofont-ui-press text-danger text-sm"></i>
                                    @endif
                                    {{ auth()->user()->name }}
                                </h4>
                                <div>
                                    <span>Inscrit {{ auth()->user()->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-item d-none">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <a href="#"><img src="assets/images/profile/Profile.jpg" alt="profile"></a>
                            </div>
                            <div class="lab-content">
                                <div class="profile-name">
                                    <div class="p-name-content">
                                        <h4>William Smith</h4>
                                        <p>Active 02 Minutes Ago</p>
                                    </div>

                                    <div class="contact-button">
                                        <button class="contact-btn">
                                            <i class="icofont-info-circle"></i>
                                        </button>
                                    </div>
                                </div>
                                <ul class="profile-contact">
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="icofont-user"></i></div>
                                            <div class="text">
                                                <p>Add Friends</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="icofont-envelope"></i></div>
                                            <div class="text">
                                                <p>Publice Message</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="icofont-envelope"></i></div>
                                            <div class="text">
                                                <p>Private Message</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="profile-details">
                        <nav class="profile-nav">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    Compte
                                </button>
                                <button class="nav-link" id="nav-security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                                    Sécurité
                                </button>
                                <button class="nav-link" id="nav-friends-tab" data-bs-toggle="tab" data-bs-target="#friends" type="button" role="tab" aria-controls="friends" aria-selected="false">
                                    Amis <span class="item-number">158</span>
                                </button>
                                <button class="nav-link" id="nav-photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="false">
                                    Photos <span class="item-number">35</span>
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane activity-page fade show active" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <article>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Vos informations basiques</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('profile.update') }}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3">
                                                                <label for="name" class="pb-2">Nom</label>
                                                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" autofocus autocomplete="name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="pb-2">Adresse e-mail</label>
                                                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" autocomplete="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gender" class="pb-2">Je suis un(e)</label>
                                                                <select name="gender" id="gender" class="form-control">
                                                                    <option value="" selected disabled>Sélectionner votre sexe</option>
                                                                    <option value="H" {{ old('gender', auth()->user()->gender) === 'H' ? 'selected' : '' }}>Homme</option>
                                                                    <option value="F" {{ old('gender', auth()->user()->gender) === 'F' ? 'selected' : '' }}>Femme</option>
                                                                    <option value="A" {{ old('gender', auth()->user()->gender) === 'A' ? 'selected' : '' }}>Autre</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="martial" class="pb-2">État civil</label>
                                                                <select name="martial" id="martial" class="form-control">
                                                                    <option value="0" selected disabled>Sélectionner votre état civil</option>
                                                                    <option value="C" {{ old('martial', auth()->user()->martial) === 'C' ? 'selected' : '' }}>Célibataire</option>
                                                                    <option value="E" {{ old('martial', auth()->user()->martial) === 'E' ? 'selected' : '' }}>En couple</option>
                                                                    <option value="MSE" {{ old('martial', auth()->user()->martial) === 'MSE' ? 'selected' : '' }}>Marié(e) sans enfant(s)</option>
                                                                    <option value="MAE" {{ old('martial', auth()->user()->martial) === 'MAE' ? 'selected' : '' }}>Marié(e) avec enfant(s)</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="age" class="pb-2">Je suis âgé de</label>
                                                                <select name="age" id="age" class="form-control">
                                                                    <option value="" selected disabled>Sélectionner votre âge</option>
                                                                    @foreach(range(18, 99) as $age)
                                                                        <option value="{{ $age }}" {{ old('age', auth()->user()->age) === $age ? 'selected' : '' }}>{{ $age }} ans</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="address" class="pb-2">Je viens de</label>
                                                                <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}" class="form-control" placeholder="Indiquer votre adresse (ex: Paris, France)" autocomplete="address">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="birth_at" class="pb-2">Je suis né(e) le</label>
                                                                <input type="date" name="birth_at" class="form-control" value="{{ old('birth_at', auth()->user()->birth_at) }}">
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'profile-updated')
                                                                    <p class="text-success">Votre compte est mis à jour.</p>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>A propos de moi</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('account.update.about') }}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3">
                                                                <label for="about_me" class="pb-2">A propos de vous</label>
                                                                <textarea name="about_me" id="about_me" cols="30"
                                                                          rows="5" class="form-control" placeholder="Je suis ...">{{ old('about_me', auth()->user()->about_me) }}</textarea>
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'about-updated')
                                                                    <p class="text-success">
                                                                        Vos information a propos sont mis à jour.
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Recherche précise</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('account.update.looking') }}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3">
                                                                <label for="looking_for" class="pb-2">Que recherchez-vous ?</label>
                                                                <textarea name="looking_for" id="looking_for" cols="30"
                                                                          rows="5" class="form-control" placeholder="Je recherche...">{{ old('looking_for', auth()->user()->looking_for) }}</textarea>
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'looking-updated')
                                                                    <p class="text-success">
                                                                        Vos information de recherche sont mis à jour.
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info-card mb-20">
                                                    <div class="info-card-title">
                                                        <h6>Style de vie</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('account.update.interest') }}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3">
                                                                <label for="interest_for" class="pb-2">Quel(s) sont vos intérêt(s) ?</label>
                                                                <input type="text" name="interest_for" value="{{ old('interest_for', auth()->user()->interest_for) }}" class="form-control" placeholder="ex: les chiens, chats, vacances, ...">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="smoking" class="pb-2">Est-ce que vous fumez ?</label>
                                                                <select name="smoking" id="smoking" class="form-control">
                                                                    <option value="" selected disabled>Sélectionner une option</option>
                                                                        <option value="PDT" {{ old('smoking', auth()->user()->smoking) === 'PDT' ? 'selected' : '' }}>Pas du tout</option>
                                                                        <option value="OED" {{ old('smoking', auth()->user()->smoking) === 'OED' ? 'selected' : '' }}>On en discutera</option>
                                                                        <option value="R" {{ old('smoking', auth()->user()->smoking) === 'R' ? 'selected' : '' }}>Rarement</option>
                                                                        <option value="O" {{ old('smoking', auth()->user()->smoking) === 'O' ? 'selected' : '' }}>Occasionnellement</option>
                                                                        <option value="RG" {{ old('smoking', auth()->user()->smoking) === 'RG' ? 'selected' : '' }}>Régulièrement</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="drinking" class="pb-2">Est-ce que vous buvez de l'alcool ?</label>
                                                                <select name="drinking" id="drinking" class="form-control">
                                                                    <option value="" selected disabled>Sélectionner une option</option>
                                                                    <option value="PDT" {{ old('drinking', auth()->user()->drinking) === 'PDT' ? 'selected' : '' }}>Pas du tout</option>
                                                                    <option value="OED" {{ old('drinking', auth()->user()->drinking) === 'OED' ? 'selected' : '' }}>On en discutera</option>
                                                                    <option value="R" {{ old('drinking', auth()->user()->drinking) === 'R' ? 'selected' : '' }}>Rarement</option>
                                                                    <option value="O" {{ old('drinking', auth()->user()->drinking) === 'O' ? 'selected' : '' }}>Occasionnellement</option>
                                                                    <option value="RG" {{ old('drinking', auth()->user()->drinking) === 'RG' ? 'selected' : '' }}>Régulièrement</option>
                                                                </select>
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'interest-updated')
                                                                    <p class="text-success">Votre style de vie est mis à jour.</p>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info-card">
                                                    <div class="info-card-title">
                                                        <h6>Information physique</h6>
                                                    </div>
                                                    <div class="info-card-content">
                                                        <form method="post" action="{{ route('account.update.physical') }}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="mb-3">
                                                                <label for="height" class="pb-2">Votre taille (cm)</label>
                                                                <input type="number" name="height" value="{{ old('height', auth()->user()->height) }}" class="form-control" placeholder="ex: 180">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="weight" class="pb-2">Votre poids (kg)</label>
                                                                <input type="number" name="weight" value="{{ old('weight', auth()->user()->weight) }}" class="form-control" placeholder="ex: 72">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="hair_color" class="pb-2">Couleur de vos cheveux</label>
                                                                <input type="text" name="hair_color" value="{{ old('hair_color', auth()->user()->hair_color) }}" class="form-control" placeholder="ex: Marron">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="eye_color" class="pb-2">Couleur de vos yeux</label>
                                                                <input type="text" name="eye_color" value="{{ old('eye_color', auth()->user()->eye_color) }}" class="form-control" placeholder="ex: Bleu et gris">
                                                            </div>
                                                            <div class="d-inline-flex align-items-center gap-4">
                                                                <button type="submit" class="lab-btn">
                                                                    <span>Sauvegarder</span>
                                                                </button>
                                                                @if (session('status') === 'physical-updated')
                                                                    <p class="text-success">Vos informations physique sont mis à jour.</p>
                                                                @endif
                                                            </div>
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
                                                            <h5>Ces membres vous likes</h5>
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
                                    <h3 class="mb-0">All Uploaded Pictures</h3>
                                </div>
                                <div class="row g-3 g-lg-4 justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/03.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/02.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/01.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/04.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/05.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/06.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/07.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/08.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/09.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/10.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/11.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/12.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/13.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/14.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/15.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/16.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/17.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/18.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/19.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="gallery-img">
                                            <img src="assets/images/member/20.jpg" alt="image" class="rounded">

                                        </div>
                                    </div>
                                </div>
                                <div class="load-btn">
                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="nav-media-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <article>
                                                <div class="media-wrapper">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="all-media-tab" data-bs-toggle="tab" data-bs-target="#all-media" type="button" role="tab" aria-controls="all-media" aria-selected="true"><i class="icofont-star"></i> All
                                                                Media</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="album-tab" data-bs-toggle="tab" data-bs-target="#album" type="button" role="tab" aria-controls="album" aria-selected="false"><i class="icofont-layout"></i> Albums
                                                                <span>04</span></button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="photos-media-tab" data-bs-toggle="tab" data-bs-target="#photos-media" type="button" role="tab" aria-controls="photos-media" aria-selected="false"><i class="icofont-image"></i>
                                                                Photos <span>12</span></button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false"><i class="icofont-video-alt"></i> Videos
                                                                <span>0</span></button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music" type="button" role="tab" aria-controls="music" aria-selected="false"><i class="icofont-music-disk"></i> Music
                                                                <span>0</span></button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <!-- All Media Tab -->
                                                        <div class="tab-pane fade show active" id="all-media" role="tabpanel" aria-labelledby="all-media-tab">
                                                            <div class="media-title">
                                                                <h3>Media Gallery</h3>
                                                            </div>
                                                            <div class="media-content">
                                                                <ul class="media-upload">
                                                                    <li class="upload-now">
                                                                        <div class="custom-upload">
                                                                            <div class="file-btn"><i class="icofont-upload-alt"></i>
                                                                                Upload</div>
                                                                            <input type="file">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-4 g-3">
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/01.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/02.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/03.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/04.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/05.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/06.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/07.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/08.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/09.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/10.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/11.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/12.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/03.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/02.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="load-btn">
                                                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Albums -->
                                                        <div class="tab-pane fade" id="album" role="tabpanel" aria-labelledby="album-tab">
                                                            <div class="media-title">
                                                                <h3>Album Lists</h3>
                                                            </div>
                                                            <div class="media-content">
                                                                <ul class="media-upload">
                                                                    <li class="upload-now">
                                                                        <div class="custom-upload">
                                                                            <div class="file-btn"><i class="icofont-upload-alt"></i>
                                                                                Upload</div>
                                                                            <input type="file">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="row g-4">
                                                                    <div class="col-lg-4 col-sm-6">
                                                                        <div class="album text-center">
                                                                            <div class="album-thumb">
                                                                                <a href="#">
                                                                                    <img src="assets/images/member/02.jpg" alt="album">
                                                                                </a>
                                                                            </div>
                                                                            <div class="album-content">
                                                                                <h6>Private</h6>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-sm-6">
                                                                        <div class="album text-center">
                                                                            <div class="album-thumb">
                                                                                <a href="#">
                                                                                    <img src="assets/images/member/03.jpg" alt="album">
                                                                                </a>
                                                                            </div>
                                                                            <div class="album-content">
                                                                                <h6>Crush</h6>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-sm-6">
                                                                        <div class="album text-center">
                                                                            <div class="album-thumb">
                                                                                <a href="#">
                                                                                    <img src="assets/images/member/06.jpg" alt="album">
                                                                                </a>
                                                                            </div>
                                                                            <div class="album-content">
                                                                                <h6>Public</h6>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-sm-6">
                                                                        <div class="album text-center">
                                                                            <div class="album-thumb">
                                                                                <a href="#">
                                                                                    <img src="assets/images/member/08.jpg" alt="album">
                                                                                </a>
                                                                            </div>
                                                                            <div class="album-content">
                                                                                <h6>Favorite</h6>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="load-btn">
                                                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Photos -->
                                                        <div class="tab-pane fade" id="photos-media" role="tabpanel" aria-labelledby="photos-media-tab">
                                                            <div class="media-title">
                                                                <h2>All Photos</h2>
                                                            </div>
                                                            <div class="media-content">
                                                                <ul class="media-upload">
                                                                    <li class="upload-now">
                                                                        <div class="custom-upload">
                                                                            <div class="file-btn"><i class="icofont-upload-alt"></i>
                                                                                Upload</div>
                                                                            <input type="file">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-4 g-3">
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/01.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/02.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/03.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/04.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/05.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/06.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/07.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/08.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/09.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/10.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/11.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/12.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/03.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="media-thumb">
                                                                            <img src="assets/images/member/02.jpg" alt="img">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="load-btn">
                                                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Videos -->
                                                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                                            <div class="media-title">
                                                                <h3>All Videos</h3>
                                                            </div>
                                                            <div class="media-content">
                                                                <ul class="media-upload">
                                                                    <li class="upload-now">
                                                                        <div class="custom-upload">
                                                                            <div class="file-btn"><i class="icofont-upload-alt"></i>
                                                                                Upload</div>
                                                                            <input type="file">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p><i class="icofont-worried"></i> Sorry !!
                                                                            There's no media found for the
                                                                            request !! </p>
                                                                    </div>
                                                                </div>
                                                                <div class="load-btn">
                                                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Music -->
                                                        <div class="tab-pane fade" id="music" role="tabpanel" aria-labelledby="music-tab">
                                                            <div class="media-title">
                                                                <h3>All Music</h3>
                                                            </div>
                                                            <div class="media-content">
                                                                <ul class="media-upload">
                                                                    <li class="upload-now">
                                                                        <div class="custom-upload">
                                                                            <div class="file-btn"><i class="icofont-upload-alt"></i>
                                                                                Upload</div>
                                                                            <input type="file">
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p><i class="icofont-worried"></i> Sorry !!
                                                                            There's no media found for the
                                                                            request !! </p>
                                                                    </div>
                                                                </div>
                                                                <div class="load-btn">
                                                                    <a href="#" class="lab-btn">Load More<i class="icofont-spinner"></i></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
