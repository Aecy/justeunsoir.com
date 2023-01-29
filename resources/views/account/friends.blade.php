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

                            <!-- Aside Part -->
                            <div class="col-xl-4">
                                <aside class="mt-5 mt-xl-0">
                                    <div class="widget search-widget">
                                        <div class="widget-inner">
                                            <div class="widget-title">
                                                <h5>Filter Search Member</h5>
                                            </div>
                                            <div class="widget-content">
                                                <p>Serious Dating With TuruLav Your Perfect
                                                    Match is Just a Click Away.</p>
                                                <form action="/" class="banner-form">
                                                    <div class="gender">
                                                        <div class="custom-select right w-100">
                                                            <select class="">
                                                                <option value="0">I am a </option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="person">
                                                        <div class="custom-select right w-100">
                                                            <select class="">
                                                                <option value="0">Looking for</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                                <option value="3">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="age">
                                                        <div class="right d-flex justify-content-between w-100">
                                                            <div class="custom-select">
                                                                <select>
                                                                    <option value="1">18</option>
                                                                    <option value="2">19</option>
                                                                    <option value="3">20</option>
                                                                    <option value="4">21</option>
                                                                    <option value="5">22</option>
                                                                    <option value="6">23</option>
                                                                    <option value="7">24</option>
                                                                    <option value="8">25</option>
                                                                    <option value="9">26</option>
                                                                    <option value="10">27</option>
                                                                    <option value="11">28</option>
                                                                    <option value="13">29</option>
                                                                    <option value="14">30</option>
                                                                </select>
                                                            </div>

                                                            <div class="custom-select">
                                                                <select>
                                                                    <option value="1">36</option>
                                                                    <option value="2">19</option>
                                                                    <option value="3">20</option>
                                                                    <option value="4">21</option>
                                                                    <option value="5">22</option>
                                                                    <option value="6">23</option>
                                                                    <option value="7">24</option>
                                                                    <option value="8">25</option>
                                                                    <option value="9">26</option>
                                                                    <option value="10">27</option>
                                                                    <option value="11">28</option>
                                                                    <option value="13">29</option>
                                                                    <option value="14">30</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="city">
                                                        <div class="custom-select right w-100">
                                                            <select class="">
                                                                <option value="0">Choose Your Country
                                                                </option>
                                                                <option value="1">USA</option>
                                                                <option value="2">UK</option>
                                                                <option value="3">Spain</option>
                                                                <option value="4">Brazil</option>
                                                                <option value="5">France</option>
                                                                <option value="6">Newzeland</option>
                                                                <option value="7">Australia</option>
                                                                <option value="8">Bangladesh</option>
                                                                <option value="9">Turki</option>
                                                                <option value="10">Chine</option>
                                                                <option value="11">India</option>
                                                                <option value="12">Canada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="interest">
                                                        <div class="custom-select right w-100">
                                                            <select class="">
                                                                <option value="0">Your Interests
                                                                </option>
                                                                <option value="1">Gaming</option>
                                                                <option value="2">Fishing</option>
                                                                <option value="3">Skydriving</option>
                                                                <option value="4">Swimming</option>
                                                                <option value="5">Racing</option>
                                                                <option value="6">Hangout</option>
                                                                <option value="7">Tranvelling</option>
                                                                <option value="8">Camping</option>
                                                                <option value="9">Touring</option>
                                                                <option value="10">Acting</option>
                                                                <option value="11">Dancing</option>
                                                                <option value="12">Singing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="">Find Your Partner</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget like-member">
                                        <div class="widget-inner">
                                            <div class="widget-title">
                                                <h5>you may like</h5>
                                            </div>
                                            <div class="widget-content">
                                                <div class="row row-cols-3 row-cols-sm-auto g-3">
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/01.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/02.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/03.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/04.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/05.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/06.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/07.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/08.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="image-thumb">
                                                            <a href="#">
                                                                <img src="assets/images/widget/09.jpg" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget active-group">
                                        <div class="widget-inner">
                                            <div class="widget-title">
                                                <h5>join the group</h5>
                                            </div>
                                            <div class="widget-content">
                                                <div class="group-item lab-item">
                                                    <div class="lab-inner d-flex flex-wrap align-items-center">
                                                        <div class="lab-content w-100">
                                                            <h6>Active Group A1</h6>
                                                            <p>Colabors atively fabcate best breed and
                                                                apcations through visionary</p>
                                                            <ul class="img-stack d-flex">
                                                                <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                                                <li class="bg-theme">12+</li>
                                                            </ul>
                                                            <div class="test"> <a href="profile.html" class="lab-btn">
                                                                    <i class="icofont-users-alt-5"></i>
                                                                    View Group</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="group-item lab-item">
                                                    <div class="lab-inner d-flex flex-wrap align-items-center">
                                                        <div class="lab-content w-100">
                                                            <h6>Active Group A2</h6>
                                                            <p>Colabors atively fabcate best breed and
                                                                apcations through visionary</p>
                                                            <ul class="img-stack d-flex">
                                                                <li><img src="assets/images/group/group-mem/01.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/02.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/03.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/04.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/05.png" alt="member-img"></li>
                                                                <li><img src="assets/images/group/group-mem/06.png" alt="member-img"></li>
                                                                <li class="bg-theme">16+</li>
                                                            </ul>
                                                            <div class="test"> <a href="profile.html" class="lab-btn">
                                                                    <i class="icofont-users-alt-5"></i>
                                                                    View Group</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
