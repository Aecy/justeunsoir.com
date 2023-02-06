@extends('layouts.master', ['title' => "Favoris de {$user->name}"])

@section('content')
  <section class="profile-section" style="padding: 155px 0;">
    <div class="container">
      <div class="section-wrapper">
        <div class="member-profile">
          @include('users.partials._profile')
          <div class="profile-details">
            @include('users.partials._nav', ['active' => "favorites"])
            <div class="row">
              <div class="col-xl-8">
                <article>
                  <div class="row gy-4 gx-3 justify-content-center">
                    @foreach($user->favoriters as $favorite)
                      <div class="col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                          <div class="lab-inner">
                            <div class="lab-thumb">
                              <img src="{{ $favorite->avatar_url }}" alt="member-img">
                            </div>
                            <div class="lab-content">
                              <h6>
                                @include('partials._user-online', ['userId' => $favorite->id])
                                <a href="{{ route('users.show', $favorite) }}">{{ $favorite->name }}</a>
                              </h6>
                              <p>{{ $favorite->age }} ans - {{ $favorite->address }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </article>
              </div>
              @include('users.partials._aside')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
