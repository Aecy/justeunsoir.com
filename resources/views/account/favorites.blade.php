@extends('layouts.master', ['title' => "Favoris de mon compte"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Favoris de mon compte</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="#">{{ $user->name }}</a></li>
                        <li class="active">Favoris</li>
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

                        @include('account.partials._nav', ['active' => "favorites"])

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
                                                            @if(Cache::has('users_online-' . $favorite->id))
                                                                <i class="icofont-ui-press text-success circle pulse"></i>
                                                            @else
                                                                <i class="icofont-ui-press text-danger"></i>
                                                            @endif
                                                            <a href="{{ route('users.show', $favorite) }}">
                                                                {{ $favorite->name }}
                                                            </a>
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

                            @include('account.partials._aside')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
