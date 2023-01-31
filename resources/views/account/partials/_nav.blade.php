<nav class="profile-nav">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a href="{{ route('dashboard') }}" class="nav-link {{ $active === 'index' ? 'active' : '' }}">
            Compte
        </a>
        <a href="{{ route('account.security') }}" class="nav-link {{ $active === 'security' ? 'active' : '' }}">
            Sécurité
        </a>
        <a href="{{ route('account.friends') }}" class="nav-link {{ $active === 'favorites' ? 'active' : '' }}">
            Favoris <span class="item-number">{{ $user->favoriters->count() }}</span>
        </a>
        <a href="{{ route('account.medias') }}" class="nav-link  {{ $active === 'medias' ? 'active' : '' }}">
            Photos <span class="item-number">{{ $user->getMedia()->count() }}</span>
        </a>
    </div>
</nav>
