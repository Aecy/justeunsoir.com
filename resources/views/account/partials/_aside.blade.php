<div class="col-xl-4">
  <aside class="mt-5 mt-xl-0">
    <div class="widget like-member">
      <div class="widget-inner">
        <div class="d-flex justify-content-between widget-title" style="align-items: center;">
          <h5>Vos crédits</h5>
          <a class="btn btn-primary btn-sm" href="{{ route('shop.index') }}">
            Acheter des crédits
          </a>
        </div>
        <div class="widget-content">
          <div class="row row-cols-3 row-cols-sm-auto g-3">
            @if($user->isAdmin())
              <p>Vous avez crédits illimités.</p>
            @else
              <p>Vous avez un total de <strong>{{ $user->credits }} crédits.</strong></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="widget like-member">
      <div class="widget-inner">
        <div class="d-flex justify-content-between widget-title" style="align-items: center;">
            <h5>Parrainage</h5>
            @if(is_null($user->referred_by))
              <button id="rewards" class="btn btn-success btn-sm">Voir les récompenses</button>
            @endif
        </div>
        <div class="widget-content">
          <div class="row row-cols-3 row-cols-sm-auto g-3">
            @if(is_null($user->referred_by))
              <p>Envoyez votre lien aux personnes que vous voulez être parrain.</p>
              <p>
                <span class="text-primary" style="font-size: 14px;">{{ url('/register?referred_by=' . $user->id) }}</span>
              </p>
              <div class="alert alert-success" id="reward-block" style="display: none">
                Le parrain reçoit 10 crédits / filleul. <br>
                Le filleul reçoit 5 crédits gratuitement.
              </div>
            @else
              <div class="alert alert-warning">
                Malheureusement, comme vous êtes un filleul. Vous ne pouvez pas parrainer à votre tour.
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="widget like-member">
      <div class="widget-inner">
        <div class="widget-title">
          <h5>Ces membres vous aimes</h5>
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
              <p>Vous n'avez aucun cœur... <i class="icofont-heart text-danger"></i></p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>

@push('scripts')
  <script type="text/javascript">
    const button = document.getElementById('rewards');
    const element = document.getElementById('reward-block');

    let open = false;

    button.addEventListener('click', function (event) {
      event.preventDefault();

      open = !open;

      if (open) {
        element.style.display = 'block';
        button.innerText = "Cacher les récompenses";
      } else {
        element.style.display = 'none';
        button.innerText = "Voir les récompenses";
      }
    });
  </script>
@endpush
