@extends('layouts.master', ['title' => 'Tarifs'])

@section('content')
    <section class="pricing-section" style="padding: 155px 0;">
        <div class="container">
            <div class="section-header">
                <h4 class="theme-color">Nos packs</h4>
                <h2>Tarifs des crédits</h2>
            </div>
            <div class="section-wrapper mt-4">
                <div class="pricing-plan-wrapper">
                    <div class="row gx-2 gy-3 justify-content-center">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="price-item">
                                    <div class="price-item-inner">
                                        <div class="price-top">
                                            <h6>{{ $product->name }}</h6>
                                            <h2>{{ number_format($product->price / 100, 2) }} €</h2>
                                            <p>
                                                <strong>{{ number_format($product->credits) }} crédits</strong>
                                            </p>
                                        </div>
                                        <div class="price-bottom">
                                            <a href="#" onclick="document.getElementById('paypal-{{ $product->id }}').submit()" class="purchase-btn">PayPal</a>
                                            <a href="#" onclick="document.getElementById('stripe-{{ $product->id }}').submit()" class="purchase-btn">Carte bancaire</a>
                                            <form id="stripe-{{ $product->id }}" class="d-none" method="post" action="{{ route('stripe.checkout', $product) }}">@csrf</form>
                                            <form id="paypal-{{ $product->id }}" class="d-none" method="post" action="{{ route('paypal.checkout', $product) }}">@csrf</form>
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
