<div class="col-xl-4">
    <aside class="mt-5 mt-xl-0">
        @if(auth()->user()->id === $user->id)
            <div class="widget like-member">
                <div class="widget-inner">
                    <div class="widget-title">
                        <h5>Modifier votre compte</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row row-cols-3 row-cols-sm-auto g-3">
                            <a href="{{ route('dashboard') }}">Modifier votre compte</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="widget like-member">
            <div class="widget-inner">
                <div class="widget-title">
                    <h5>Ces membres vous likes</h5>
                </div>
                <div class="widget-content">
                    <div class="row row-cols-3 row-cols-sm-auto g-3">
                        @forelse($user->likers()->get() as $liker)
                        <div class="col">
                            <div class="image-thumb">
                                <a href="{{ route('users.show', $liker) }}">
                                    <img src="{{ $liker->avatar_url }}" style="height: 90px; width: 90px" alt="img">
                                </a>
                            </div>
                        </div>
                        @empty
                            <p>Aucun likes.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
