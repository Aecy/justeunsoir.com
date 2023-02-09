@extends('layouts.master', ['title' => "Photos de mon compte"])

@section('content')
  <section class="profile-section padding-tb">
    <div class="container">
      <div class="section-wrapper">
        <div class="member-profile">
          @include('account.partials._profile')
          <div class="profile-details">
            @include('account.partials._nav', ['active' => "medias"])
            <div class="photo-title text-center border-radius-2 bg-theme p-1 mb-4">
              <h3 class="mb-0">Toutes vos photos</h3>
            </div>
            <div
              class="row g-3 g-lg-4 justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
              @foreach($user->getMedia() as $media)
                <div class="col">
                  <div class="gallery-img">
                    <img src="{{ $media->getUrl() }}" alt="image" class="rounded">
                  </div>
                </div>
              @endforeach
            </div>
            <div class="edit-photo custom-upload mt-4">
              <button class="btn-lab lab-btn">
                <i class="icofont-camera"></i> Ajouter une nouvelle photo
              </button>
              <form id="media" action="{{ route('account.store.media') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="media" onchange="event.preventDefault(); document.getElementById('media').submit()">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
