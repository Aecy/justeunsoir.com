@extends('layouts.master', ['title' => 'Accueil'])

@section('content')
    <section class="pricing-section padding-tb">
        <div class="container">
            <div class="section-header">
                <h4 class="theme-color">Nos packs</h4>
                <h2>Tarifs des crédits</h2>
            </div>
            <div class="section-wrapper mt-4">
                <div class="pricing-plan-wrapper">
                    <div class="row gx-2 gy-3 justify-content-center">
                        @foreach($packs as $pack)
                            <div class="col-lg-4 col-sm-6">
                                <div class="price-item">
                                    <div class="price-item-inner">
                                        <div class="price-top">
                                            <h6>{{ $pack['name'] }}</h6>
                                            <h2>{{ number_format($pack['price'] / 100, 2) }} €</h2>
                                            <p>
                                                <strong>{{ number_format($pack['credit']) }} crédits</strong>
                                            </p>
                                        </div>
                                        <div class="price-bottom">
                                            <a href="#" class="purchase-btn">Acheter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
