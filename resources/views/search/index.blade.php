@extends('layouts.master', ['title' => 'Recherchez votre match'])

@section('content')
  <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
    <div class="container" style="padding-bottom: 30px">
      <div class="page-header-content">
        <div class="page-header-inner">
          <div class="page-title">
            <h2>Recherchez votre match</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="member-page-section">
    <div class="container">
      <div class="member-filter">
        <div class="member-filter-inner">
          <form action="{{ route('search.index') }}" method="get" class="filter-form">
            <div class="person">
              <div class="custom-select right w-100">
                <select name="looking" id="looking" class="">
                  <option value="">Je recherche...</option>
                  @foreach(\App\Enums\User\UserGendersEnum::cases() as $gender)
                    <option value="{{ $gender }}" {{ request()->looking === $gender->value ? 'selected' : '' }}>
                      {{ $gender->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="age">
              <div class="right d-flex justify-content-between w-100">
                <div class="custom-select">
                  <select name="start_age" id="start_age">
                    @foreach(range(18, 99) as $age)
                      <option value="{{ $age }}" {{ request()->start_age == $age ? 'selected' : '' }}>{{ $age }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="custom-select">
                  <select name="end_age" id="end_age">
                    @foreach(range(18, 99) as $age)
                      <option value="{{ $age }}" {{ request()->end_age == $age ? 'selected' : '' }}>{{ $age }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="gender">
              <div class="custom-select right w-100">
                <select name="country" id="country" class="">
                  <option value="0" selected disabled>Dans le pays...</option>
                    <option value="FR" {{ request()->country === 'FR' ? 'selected' : '' }}>France</option>
                    <option value="BE" {{ request()->country === 'BE' ? 'selected' : '' }}>Belgique</option>
                </select>
              </div>
            </div>
            <div class="city">
              <div class="custom-select right w-100">
                <select name="state" id="state" class="">
                  <option value="0" selected disabled>Dans la province...</option>
                </select>
              </div>
            </div>
            <button class="lab-btn" type="submit">Rechercher <i class="icofont-search-2"></i></button>
          </form>
        </div>
      </div>
      <div class="member-wrapper">
        <ul class="member-info mb-4">
          <li class="all-member">
            <p>{{ $users->total() > 1 ? 'Membres trouvés' : 'Membre trouvé' }}</p>
            <p>{{ $users->total() }}</p>
          </li>
          <li class="member-cat">
            <div class="custom-select right w-100">
              <select name="member" id="member-cat" class="">
                <option value="0">Inscrit récemment</option>
              </select>
            </div>
          </li>
        </ul>
        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 justify-content-center">
          @forelse($users as $user)
            <div class="col">
              <div class="lab-item member-item style-1 style-2">
                <div class="lab-inner">
                  <div class="lab-thumb">
                    <img src="{{ $user->avatar_url }}" alt="member-img">
                  </div>
                  <div class="lab-content">
                    <h6>
                      <a href="{{ route('users.show', $user) }}">
                        @include('partials._user-online', ['userId' => $user->id])
                        {{ $user->name }}
                      </a>
                    </h6>
                    <p>{{ $user->age }} ans - {{ $user->state }}</p>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="text-danger fw-bolder">
              Désolé, nous avons trouvé personne avec ce résultat.
            </div>
          @endforelse
        </div>
        {{ $users->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script type="text/javascript">
    const france = [
      {id: 0, name: 'Dans la province...'},
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
      {id: 0, name: 'Dans la province...'},
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
      if (name == "{{ request()->state }}") {
        return true;
      }
      return false;
    }
  </script>
@endpush
