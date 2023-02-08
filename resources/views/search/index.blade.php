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
            <div class="gender">
              <div class="custom-select right w-100">
                <select name="gender" id="gender" class="">
                  <option value="0" selected disabled>Je suis un(e)</option>
                  @foreach(\App\Enums\User\UserGendersEnum::cases() as $gender)
                    <option value="{{ $gender }}" {{ request()->gender === $gender->value ? 'selected' : '' }}>
                      {{ $gender->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="person">
              <div class="custom-select right w-100">
                <select name="looking" id="looking" class="">
                  <option value="">Je recherche un(e)</option>
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
            <div class="city">
              <div class="custom-input right w-100">
                <input type="text" name="address" id="address" class="form-control" style="height: 40px; border-radius: 0px; color: white;" placeholder="Indiquez la ville" value="{{ request()->address }}">
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
          @foreach($users as $user)
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
          @endforeach
        </div>
        {{ $users->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </section>
@endsection
