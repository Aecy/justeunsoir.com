@extends('layouts.master', ['title' => "Mon compte"])

@section('content')
    <section class="page-header-section style-1" style="background:url({{ asset('assets/images/page-header.jpg') }})">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Mon compte</h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li class="active">{{ $user->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-section padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">

                    @include('account.partials._profile')

                    <div class="profile-details">

                        @include('account.partials._nav', ['active' => "friends"])

                        <div class="row">
                            <div class="col-xl-8">
                                <article>
                                    <div class="row gy-4 gx-3 justify-content-center">
                                        <div class=" col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/01.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">jenifer Guido</a> </h6>
                                                        <p>Active 1 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/02.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Andrea Guido</a> </h6>
                                                        <p>Active 2 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/03.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Anna hawk</a> </h6>
                                                        <p>Active 5 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/04.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Andreas Adam</a> </h6>
                                                        <p>Active 4 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/05.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Alaina T</a> </h6>
                                                        <p>Active 1 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/06.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Aron Smith</a> </h6>
                                                        <p>Active 3 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/07.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Helen Gomz</a> </h6>
                                                        <p>Active 3 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/08.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Andrez jr</a> </h6>
                                                        <p>Active 5 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/09.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Ladiga Guido</a> </h6>
                                                        <p>Active 5 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/10.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Andrea Guido</a> </h6>
                                                        <p>Active 1 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/11.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Jene Aiko</a> </h6>
                                                        <p>Active 4 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/12.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Jhon Cena</a> </h6>
                                                        <p>Active 2 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/13.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Irfan Patel </a> </h6>
                                                        <p>Active 5 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/14.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Hames Radregez</a> </h6>
                                                        <p>Active 1 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/15.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Johan ben</a> </h6>
                                                        <p>Active 2 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/16.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Johannes</a> </h6>
                                                        <p>Active 6 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/17.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Helena Mind</a> </h6>
                                                        <p>Active 4 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/18.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Virat Alba</a> </h6>
                                                        <p>Active 3 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/19.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Afrin Nawr</a> </h6>
                                                        <p>Active 5 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="lab-item member-item style-1">
                                                <div class="lab-inner">
                                                    <div class="lab-thumb">
                                                        <img src="assets/images/member/20.jpg" alt="member-img">
                                                    </div>
                                                    <div class="lab-content">
                                                        <h6><a href="#">Jason Roy</a> </h6>
                                                        <p>Active 2 Day</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            @include('account.partials._aside')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
