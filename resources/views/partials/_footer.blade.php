<footer class="footer-section">
  <div class="footer-middle padding-tb" style="background-image: url({{ asset('assets/images/footer/bg.png') }});">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-lg-4 col-md-6 col-12">
          <div class="footer-middle-item-wrapper">
            <div class="footer-middle-item mb-lg-0">
              <div class="fm-item-title">
                <h4>A propos de {{ config('app.name') }}</h4>
              </div>
              <div class="fm-item-content">
                <p class="mb-4">
                  Des rencontres sans attaches, des moments inoubliables:
                  Rejoignez notre communauté de personnes libres et ouvertes d'esprit pour des rencontres d'un soir.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="footer-middle-item-wrapper">
            <div class="footer-middle-item mb-lg-0">
              <div class="fm-item-title">
                <h4>Informations</h4>
              </div>
              <div class="fm-item-content">
                <div class="fm-item-widget lab-item">
                  <div class="lab-inner">
                    <div class="lab-content">
                      <h6>
                        <a href="{{ url('/') }}">Accueil</a>
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="fm-item-widget lab-item">
                  <div class="lab-inner">
                    <div class="lab-content">
                      <h6>
                        <a href="{{ route('search.index') }}">Recherches</a>
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="fm-item-widget lab-item">
                  <div class="lab-inner">
                    <div class="lab-content">
                      <h6>
                        <a href="{{ route('reward.index') }}">Récompenses</a>
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="fm-item-widget lab-item">
                  <div class="lab-inner">
                    <div class="lab-content">
                      <h6>
                        <a href="{{ route('shop.index') }}">Tarifs</a>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="footer-middle-item-wrapper">
            <div class="footer-middle-item mb-lg-0">
              <div class="fm-item-title">
                <h4>Reste du site</h4>
              </div>
              <div class="fm-item-content">
                <div class="fm-item-widget lab-item">
                  <div class="lab-inner">
                    <div class="lab-content">
                      <h6>
                        <a href="{{ route('faq') }}">Foire aux questions</a>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="footer-bottom-content text-center">
            <p>&copy; {{ now()->format('Y') }}
              <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a> - Tous droits réservés
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

@stack('scripts')
