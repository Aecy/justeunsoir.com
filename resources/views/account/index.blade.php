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
                            <form method="post" action="{{ route('account.update.information') }}">
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
                                <label for="gender" class="pb-2">Genre</label>
                                <select name="gender" id="gender" class="form-control">
                                  <option value="" selected disabled>Sélectionner votre sexe</option>
                                  @foreach(\App\Enums\User\UserGendersEnum::cases() as $gender)
                                    <option value="{{ $gender }}" {{ old('gender', $user->gender) === $gender ? 'selected' : '' }}>
                                      {{ $gender->name }}
                                    </option>
                                  @endforeach
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
                                <label for="age" class="pb-2">Âge</label>
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
                                <label for="country" class="pb-2">Pays</label>
                                <select name="country" id="country" class="form-control">
                                  <option value="FR" {{ old('country', $user->country) == 'FR' ? 'selected' : '' }}>France</option>
                                  <option value="BE" {{ old('country', $user->country) == 'BE' ? 'selected' : '' }}>Belgique</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="state" class="pb-2">Province</label>
                                <select name="state" id="state" class="form-control">
                                  <option value=""></option>
                                </select>
                              </div>
                              <div class="mb-4">
                                <label for="birth_at" class="pb-2">Date de naissance</label>
                                <input type="date" name="birth_at" class="form-control" value="{{ old('birth_at', $user->birth_at) }}">
                              </div>
                              <div class="d-inline-flex align-items-center gap-4">
                                <button type="submit" class="lab-btn">
                                  <span>Sauvegarder</span>
                                </button>
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

@push('scripts')
  <script type="text/javascript">
    const france = [
      {id: 0, name: 'Sélectionner votre province'},
      {id: 1, name: "Alsace"},
      {id: 2, name: "Aquitaine"},
      {id: 3, name: "Auvergne"},
      {id: 4, name: "Basse-Normandie"},
      {id: 5, name: "Bourgogne"},
      {id: 6, name: "Bretagne"},
      {id: 7, name: "Centre"},
      {id: 8, name: "Champagne-Ardenne"},
      {id: 9, name: "Corse"},
      {id: 10, name: "Franche-Comté"},
      {id: 11, name: "Haute-Normandie"},
      {id: 12, name: "Île-de-France"},
      {id: 13, name: "Languedoc-Roussillon"},
      {id: 14, name: "Limousin"},
      {id: 15, name: "Lorraine"},
      {id: 16, name: "Midi-Pyrénées"},
      {id: 17, name: "Nord-Pas-de-Calais"},
      {id: 18, name: "Pays de la Loire"},
      {id: 19, name: "Picardie"},
      {id: 20, name: "Poitou-Charentes"},
      {id: 21, name: "Provence-Alpes-Côte d'Azur"},
      {id: 22, name: "Rhône-Alpes"},
    ];
    const belgium = [
      {id: 0, name: 'Sélectionner votre province'},
      {id: 1, name: 'Anvers'},
      {id: 2, name: 'Limbourg'},
      {id: 3, name: 'Liège'},
      {id: 4, name: 'Luxembourg'},
      {id: 5, name: 'Namur'},
      {id: 6, name: 'Brabant wallon'},
      {id: 7, name: 'Brabant flamand'},
      {id: 8, name: 'Bruxelles'},
      {id: 9, name: 'Hainaut'},
      {id: 10, name: 'Flandre orientale'},
      {id: 11, name: 'Flandre occidentale'},
    ];

    let stateElement = document.getElementById('state-group');
    let countryElement = document.getElementById('country');
    let stateFormEl = document.getElementById('state');

    loadStates(countryElement.value);

    countryElement.addEventListener('change', function (event) {
      const select = event.target;
      const value = select.value;

      let options = stateFormEl.getElementsByTagName('option');
      for (let i = options.length; i--;) {
        stateFormEl.removeChild(options[i]);
      }

      loadStates(value);
    });

    function loadStates(value) {
      if (value === 'FR') {
        france.forEach(function (state) {
          let option = document.createElement('option');
          option.value = state.name;
          option.innerText = state.name;
          option.selected = selectedState(state.name);

          stateFormEl.appendChild(option);
        });
      } else if (value === 'BE') {
        belgium.forEach(function (state) {
          let option = document.createElement('option');
          option.value = state.name;
          option.innerText = state.name;
          option.selected = selectedState(state.name);

          stateFormEl.appendChild(option);
        });
      } else {
        // Nothing to do.
      }
    }

    function selectedState(name) {
      if (name == "{!! $user->state !!}") {
        return true;
      }
      return false;
    }
  </script>
@endpush
