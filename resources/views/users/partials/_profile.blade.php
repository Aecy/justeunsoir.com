<div class="profile-item">
  <div class="profile-cover">
    <img src="{{ asset('assets/images/profile/cover.jpg') }}" alt="cover-pic">
  </div>
  <div class="profile-information">
    <div class="profile-pic">
      <img src="{{ $user->avatar_url }}" alt="DP">
    </div>
    <div class="profile-name">
      <h4>
        @include('partials._user-online', ['userId' => $user->id])
        {{ $user->name }}
      </h4>
      <span>{{ $user->gender === 'F' ? 'Inscrite' : 'Inscrit' }} {{ $user->created_at->diffForHumans() }}</span>
    </div>
    @if(auth()->user()->id !== $user->id)
      <ul class="profile-contact">
        <li>
          <a href="{{ route('users.like', $user) }}">
            <div class="icon"><i class="icofont-heart"></i></div>
            <div class="text">
              @if(auth()->user()->hasLiked($user))
                <p>Retirer votre coeur</p>
              @else
                <p>Envoyer un coeur</p>
              @endif
            </div>
          </a>
        </li>
        <li>
          <a href="{{ route('users.favorite', $user) }}">
            <div class="icon"><i class="icofont-user"></i></div>
            <div class="text">
              @if($user->isFavoritedBy(auth()->user()))
                <p>Retirer des favoris</p>
              @else
                <p>Ajouter aux favoris</p>
              @endif
            </div>
          </a>
        </li>
        <li>
          <a href="{{ route('conversations.store', $user) }}">
            <div class="icon"><i class="icofont-envelope"></i></div>
            <div class="text">
              <p>Message privé</p>
            </div>
          </a>
        </li>
      </ul>
    @endif
  </div>
</div>
