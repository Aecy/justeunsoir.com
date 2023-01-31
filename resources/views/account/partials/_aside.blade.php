<div class="col-xl-4">
    <aside class="mt-5 mt-xl-0">
        <div class="widget like-member">
            <div class="widget-inner">
                <div class="d-flex justify-content-between widget-title">
                    <h5>Vos crédits</h5>
                    <a href="#">Acheter des crédits</a>
                </div>
                <div class="widget-content">
                    <div class="row row-cols-3 row-cols-sm-auto g-3">
                        @if($user->isAdmin())
                            <p>Vous avez crédits illimités.</p>
                        @else
                            <p>Vous avez un total de <strong>{{ $user->messages_left }} crédits.</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="widget like-member">
            <div class="widget-inner">
                <div class="widget-title">
                    <h5>Ces membres vous likes</h5>
                </div>
                <div class="widget-content">
                    <div class="row row-cols-3 row-cols-sm-auto g-3">
                        @forelse($user->likes() as $liker)
                        <div class="col">
                            <div class="image-thumb">
                                <a href="#">
                                    <img src="{{ $liker->user->avatar_url }}" alt="img">
                                </a>
                            </div>
                        </div>
                        @empty
                            <p>Vous n'avez aucun likes.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
