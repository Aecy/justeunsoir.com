@extends('layouts.master', ['title' => "Vos conversations"])

@section('content')
    <section class="profile-section" style="padding: 155px 0;">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">

                    <div class="profile-details">
                        <div class="row">
                            <div class="col-xl-8">
                                <article>
                                    <div class="info-card mb-20">
                                        <div class="info-card-title">
                                            <h6>Aucune conversation en cours...</h6>
                                        </div>

                                    </div>
                                </article>
                            </div>

                            @include('conversations.partials._aside')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
