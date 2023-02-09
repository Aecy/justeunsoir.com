@extends('layouts.master', ['title' => "Sécurité de mon compte"])

@section('content')
  <section class="profile-section padding-tb">
    <div class="container">
      <div class="section-wrapper">
        <div class="member-profile">
          @include('account.partials._profile')
          <div class="profile-details">
            @include('account.partials._nav', ['active' => "security"])
            <div class="row">
              <div class="col-xl-8">
                <article>
                  <div class="info-card mb-20">
                    <div class="info-card-title">
                      <h6>Modifier votre mot de passe</h6>
                    </div>
                    <div class="info-card-content">
                      <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                          <label for="current_password" class="pb-2">Mot de passe actuel</label>
                          <input type="password" name="current_password" class="form-control" autocomplete="current-password">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="pb-2">Nouveau mot de passe</label>
                          <input type="password" name="password" class="form-control" autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                          <label for="password_confirmation" class="pb-2">Confirmer mot de passe</label>
                          <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
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
                      <h6>Supprimer votre compte</h6>
                    </div>
                    <div class="info-card-content">
                      <p class="mb-4">
                        Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.
                        Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que
                        vous souhaitez conserver.
                      </p>
                      <form method="post" action="{{ route('account.delete') }}">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                          <label for="password" class="pb-2">Mot de passe actuel</label>
                          <input type="password" name="password" class="form-control">
                          @error('password')
                            <div class="invalid-feedback" style="display: block">
                              <strong>{{ $message }}</strong>
                            </div>
                          @enderror
                        </div>
                        <button type="submit" class="lab-btn">
                          <span>Supprimer le compte</span>
                        </button>
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
  </section>
@endsection
