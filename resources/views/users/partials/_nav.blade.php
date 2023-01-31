<nav class="profile-nav">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a href="{{ route('users.show', $user) }}" class="nav-link {{ $active === 'index' ? 'active' : '' }}">
            Son profile
        </a>
        <a href="{{ route('favorites.show', $user) }}" class="nav-link {{ $active === 'friends' ? 'active' : '' }}">
            Ses favoris <span class="item-number">{{ $user->favoriters->count() }}</span>
        </a>
        <a href="{{ route('medias.show', $user) }}" class="nav-link  {{ $active === 'medias' ? 'active' : '' }}">
            Ses photos <span class="item-number">{{ $user->getMedia()->count() }}</span>
        </a>
    </div>
</nav>
