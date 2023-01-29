@extends('layouts.master', ['title' => "Récompenses"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Récompenses</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">Récompenses</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section padding-tb">
        <div class="container">
            <div class="section-header">
                <h4 class="theme-color">Récompenses</h4>
                <h2>Vos récompenses quotidiennes</h2>
            </div>
            <div class="section-wrapper mt-4">
                <div class="pricing-plan-wrapper text-center">
                    @if(session('success'))
                        <p class="font-bolder text-green mb-2">
                            {{ session('success') }}
                        </p>
                    @endif
                    @if(session('danger'))
                        <p class="font-bolder text-danger mb-2">
                            {{ session('danger') }}
                        </p>
                    @endif
                    @if($can)
                            <form action="{{ route('reward.store') }}" method="post">
                                @csrf
                                <button type="submit" class="lab-btn">
                                    Récupérer votre récompense
                                </button>
                            </form>
                    @else
                        <h5 class="text-danger">
                            <i class="icofont-exclamation-tringle text-xl"></i>
                            Revenez {{ $user->last_reward->addHours(24)->diffForHumans() }} pour obtenir une récompense.
                        </h5>
                    @endif
                </div>
            </div>
        </div>

    </section>
@endsection
