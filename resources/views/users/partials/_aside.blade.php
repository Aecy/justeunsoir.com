<div class="col-xl-4">
  <aside class="mt-5 mt-xl-0">
    <div class="widget like-member">
      <div class="widget-inner">
        <div class="widget-title">
          <h5>Membres ayant aimés</h5>
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
              <p>A reçu encore aucun cœur... <i class="icofont-heart text-muted"></i></p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <div class="widget like-member">
      <div class="widget-inner">
        <div class="widget-title">
          <h5>Favorisés par les membres</h5>
        </div>
        <div class="widget-content">
          <div class="row row-cols-3 row-cols-sm-auto g-3">
            @forelse($user->favoriters as $liker)
              <div class="col">
                <div class="image-thumb">
                  <a href="{{ route('users.show', $liker) }}">
                    <img src="{{ $liker->avatar_url }}" style="height: 90px; width: 90px" alt="img">
                  </a>
                </div>
              </div>
            @empty
              <p>Aucun favoris.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>
