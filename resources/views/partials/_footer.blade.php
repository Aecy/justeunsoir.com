<footer class="footer-section">
    <div class="footer-middle padding-tb" style="background-image: url({{ asset('assets/images/footer/bg.png') }});">
        <div class="container">
            <div class="row">
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
                                <img src="{{ asset('assets/images/footer/about.jpg') }}" alt="about-image" class="footer-abt-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="footer-middle-item-wrapper">
                        <div class="footer-middle-item mb-lg-0">
                            <div class="fm-item-title">
                                <h4>Plan du site</h4>
                            </div>
                            <div class="fm-item-content">
                                <div class="fm-item-widget lab-item">
                                    <div class="lab-inner">
                                        <div class="lab-content">
                                            <h6>
                                                <a href="#">Accueil</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="fm-item-widget lab-item">
                                    <div class="lab-inner">
                                        <div class="lab-content">
                                            <h6>
                                                <a href="#">Accueil</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="fm-item-widget lab-item">
                                    <div class="lab-inner">
                                        <div class="lab-content">
                                            <h6>
                                                <a href="#">Accueil</a>
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
                        <div class="footer-middle-item-3 mb-lg-0">
                            <div class="fm-item-title">
                                <h4>Inscription à la newsletter</h4>
                            </div>
                            <div class="fm-item-content">
                                <p>En vous inscrivant à la newsletter, vous recevrez toutes les mises à jour par mail.</p>
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Entrez votre adresse mail">
                                    </div>
                                    <button type="submit" class="lab-btn">
                                        Recevoir votre massage <i class="icofont-paper-plane"></i>
                                    </button>
                                </form>
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
