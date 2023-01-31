@extends('layouts.master', ['title' => "Photos de {$user->name}"])

@section('content')
    <section class="profile-section" style="padding: 155px 0;">
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
