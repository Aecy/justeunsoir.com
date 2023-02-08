@extends('layouts.master', ['title' => "S'enregistrer"])

@section('content')
  <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
    <div class="container">
      <div class="page-header-content">
        <div class="page-header-inner">
          <div class="page-title">
            <h2>S'enregistrer</h2>
          </div>
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
            <select name="country" id="country" class="form-control" style="border: 1px solid rgba(223, 49, 77, 0.3); height: 45.19px; padding: 0.6rem 1rem;">
              <option value="0" selected disabled>Sélectionner votre pays</option>
              <option value="FR">France</option>
              <option value="BE">Belgique</option>
            </select>
            @error("country")
            <div class="text-danger align-items-start" style="display: block">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group" id="state-group" style="display: none;">
            <select name="state" id="state" class="form-control" style="border: 1px solid rgba(223, 49, 77, 0.3); height: 45.19px; padding: 0.6rem 1rem;">
              <option value="0" selected disabled>Sélectionner votre province</option>
            </select>
            @error("state")
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
              Vous êtes déjà membre ?
            <a href="{{ route('login') }}">
              Connectez-vous
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
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

    countryElement.addEventListener('change', function (event) {
      const select = event.target;
      const value = select.value;

      let options = stateFormEl.getElementsByTagName('option');
      for (let i = options.length; i--;) {
        stateFormEl.removeChild(options[i]);
      }

      if (value === 'FR') {
        stateElement.style.display = 'block';

        france.forEach(function (state) {
          let option = document.createElement('option');
          option.value = state.name;
          option.innerText = state.name;

          stateFormEl.appendChild(option);
        });
      } else if (value === 'BE') {
        stateElement.style.display = 'block';

        belgium.forEach(function (state) {
          let option = document.createElement('option');
          option.value = state.name;
          option.innerText = state.name;

          stateFormEl.appendChild(option);
        });
      } else {
        // Nothing to do.
      }
    });
  </script>
@endpush
