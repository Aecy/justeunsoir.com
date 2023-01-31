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

                        @include('users.partials._nav', ['active' => "medias"])

                        <div class="photo-title text-center border-radius-2 bg-theme p-1 mb-4">
                            <h3 class="mb-0">Toutes ses photos</h3>
                        </div>
                        <div class="row g-3 g-lg-4 justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                            @forelse($user->getMedia() as $media)
                                <div class="col">
                                    <div class="gallery-img">
                                        <img src="{{ $media->getUrl() }}" alt="image" class="rounded">
                                    </div>
                                </div>
                            @empty
                                <div class="col">
                                    Aucunes photos.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
