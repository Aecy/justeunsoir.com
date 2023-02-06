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
            <li><a href="#">{{ $user->name }}</a></li>
            <li class="active">Compte</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="profile-section padding-tb">
    <div class="container">
      <div class="section-wrapper">
        <div class="member-profile">
          @include('account.partials._profile')
          <div class="profile-details">
            @include('account.partials._nav', ['active' => "index"])
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane activity-page fade show active" id="profile" role="tabpanel"
                   aria-labelledby="nav-profile-tab">
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
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" autocomplete="name">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="pb-2">Adresse e-mail</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" autocomplete="email">
                              </div>
                              <div class="mb-3">
                                <label for="gender" class="pb-2">Je suis un(e)</label>
                                <select name="gender" id="gender" class="form-control">
                                  <option value="" selected disabled>Sélectionner votre sexe</option>
                                  <option value="H" {{ old('gender', $user->gender) === 'H' ? 'selected' : '' }}>Homme</option>
                                  <option value="F" {{ old('gender', $user->gender) === 'F' ? 'selected' : '' }}>Femme</option>
                                  <option value="A" {{ old('gender', $user->gender) === 'A' ? 'selected' : '' }}>Autre</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="martial" class="pb-2">État civil</label>
                                <select name="martial" id="martial" class="form-control">
                                  <option value="0" selected disabled>Sélectionner votre état civil</option>
                                  <option value="C" {{ old('martial', $user->martial) === 'C' ? 'selected' : '' }}>Célibataire</option>
                                  <option value="E" {{ old('martial', $user->martial) === 'E' ? 'selected' : '' }}>En couple</option>
                                  <option value="MSE" {{ old('martial', $user->martial) === 'MSE' ? 'selected' : '' }}>Marié(e) sans enfant(s)</option>
                                  <option value="MAE" {{ old('martial', $user->martial) === 'MAE' ? 'selected' : '' }}>Marié(e) avec enfant(s)</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="age" class="pb-2">Je suis âgé de</label>
                                <select name="age" id="age" class="form-control">
                                  <option value="" selected disabled>Sélectionner votre âge</option>
                                  @foreach(range(18, 99) as $age)
                                    <option
                                      value="{{ $age }}" {{ old('age', $user->age) === $age ? 'selected' : '' }}>{{ $age }}
                                      ans
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="address" class="pb-2">Je viens de</label>
                                <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control" placeholder="Indiquez votre ville (ex: Bruxelles)" autocomplete="state">
                              </div>
                              <div class="mb-4">
                                <label for="birth_at" class="pb-2">Je suis né(e) le</label>
                                <input type="date" name="birth_at" class="form-control" value="{{ old('birth_at', $user->birth_at) }}">
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
                                <textarea name="about_me" id="about_me" cols="30" rows="5" class="form-control" placeholder="Je suis ...">{{ old('about_me', $user->about_me) }}</textarea>
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
                                <textarea name="looking_for" id="looking_for" cols="30" rows="5" class="form-control" placeholder="Je recherche...">{{ old('looking_for', $user->looking_for) }}</textarea>
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
                                <input type="text" name="interest_for" value="{{ old('interest_for', $user->interest_for) }}" class="form-control" placeholder="ex: les chiens, chats, vacances, ...">
                              </div>
                              <div class="mb-3">
                                <label for="smoking" class="pb-2">Est-ce que vous fumez ?</label>
                                <select name="smoking" id="smoking" class="form-control">
                                  <option value="" selected disabled>Sélectionner une option</option>
                                  <option value="PDT" {{ old('smoking', $user->smoking) === 'PDT' ? 'selected' : '' }}>Pas du tout</option>
                                  <option value="OED" {{ old('smoking', $user->smoking) === 'OED' ? 'selected' : '' }}>On en discutera</option>
                                  <option value="R" {{ old('smoking', $user->smoking) === 'R' ? 'selected' : '' }}>Rarement</option>
                                  <option value="O" {{ old('smoking', $user->smoking) === 'O' ? 'selected' : '' }}>Occasionnellement</option>
                                  <option value="RG" {{ old('smoking', $user->smoking) === 'RG' ? 'selected' : '' }}>Régulièrement</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="drinking" class="pb-2">Est-ce que vous buvez de l'alcool ?</label>
                                <select name="drinking" id="drinking" class="form-control">
                                  <option value="" selected disabled>Sélectionner une option</option>
                                  <option value="PDT" {{ old('drinking', $user->drinking) === 'PDT' ? 'selected' : '' }}>Pas du tout</option>
                                  <option value="OED" {{ old('drinking', $user->drinking) === 'OED' ? 'selected' : '' }}>On en discutera</option>
                                  <option value="R" {{ old('drinking', $user->drinking) === 'R' ? 'selected' : '' }}>Rarement</option>
                                  <option value="O" {{ old('drinking', $user->drinking) === 'O' ? 'selected' : '' }}>Occasionnellement</option>
                                  <option value="RG" {{ old('drinking', $user->drinking) === 'RG' ? 'selected' : '' }}>Régulièrement</option>
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
                                <input type="number" name="height" value="{{ old('height', $user->height) }}" class="form-control" placeholder="ex: 180">
                              </div>
                              <div class="mb-3">
                                <label for="morphology" class="pb-2">Votre morphologie</label>
                                <select name="morphology" id="morphology" class="form-control">
                                  <option value="" selected disabled>Sélectionner votre morphologie</option>
                                  <option value="S" {{ old('morphology', $user->morphology) === 'S' ? 'selected' : '' }}>Sportif(ve)</option>
                                  <option value="M" {{ old('morphology', $user->morphology) === 'M' ? 'selected' : '' }}>Mince</option>
                                  <option value="D" {{ old('morphology', $user->morphology) === 'D' ? 'selected' : '' }}>Délicate</option>
                                  <option value="N" {{ old('morphology', $user->morphology) === 'N' ? 'selected' : '' }}>Normal</option>
                                  <option value="Q" {{ old('morphology', $user->morphology) === 'Q' ? 'selected' : '' }}>Quelque kilos en trop</option>
                                  <option value="R" {{ old('morphology', $user->morphology) === 'R' ? 'selected' : '' }}>Rond(e)</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="hair_color" class="pb-2">Couleur de vos cheveux</label>
                                <input type="text" name="hair_color" value="{{ old('hair_color', $user->hair_color) }}" class="form-control" placeholder="ex: Marron">
                              </div>
                              <div class="mb-3">
                                <label for="eye_color" class="pb-2">Couleur de vos yeux</label>
                                <input type="text" name="eye_color" value="{{ old('eye_color', $user->eye_color) }}" class="form-control" placeholder="ex: Bleu et gris">
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
                    @include('account.partials._aside')
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
