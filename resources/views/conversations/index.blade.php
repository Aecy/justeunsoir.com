@extends('layouts.master', ['title' => "Vos conversations"])

@section('content')
    <section class="profile-section" style="padding: 155px 0;">
        <div class="container">
            <div class="section-wrapper">
                <div class="member-profile">

                    <div class="profile-details">
                        <div class="row">
                            <div class="col-xl-12">
                                <article>
                                    <div class="info-card mb-20">
                                        <div class="info-card-title">
                                            <h6>Vos conversations</h6>
                                        </div>
                                        @foreach($conversations as $item)
                                            <div class="post-item">
                                                <div class="post-content">
                                                    <div class="post-author">
                                                        <div class="post-author-inner">
                                                            <div class="author-thumb">
                                                                @foreach($item->conversation->participants as $participant)
                                                                    @if($participant->messageable->name !== auth()->user()->name)
                                                                        <img src="{{ $participant->messageable->avatar_url }}" alt="img"
                                                                             style="height: 70px; width: 70px;  border-radius: 50%;">
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <a href="{{ route('conversations.show', $item->conversation_id) }}">
                                                                        @foreach($item->conversation->participants as $participant)
                                                                            @if($participant->messageable->name !== auth()->user()->name)
                                                                                @if(Cache::has('users_online-' . $participant->messageable->id))
                                                                                    <i class="icofont-ui-press text-success text-sm circle pulse"></i>
                                                                                @else
                                                                                    <i class="icofont-ui-press text-danger text-sm"></i>
                                                                                @endif
                                                                                <span class="fw-bolder" title="{{ $participant->messageable->name }}">
                                                    {{ \Illuminate\Support\Str::limit($participant->messageable->name, 20) }}
                                                </span>
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                    <p class="text-muted">
                                                                        @if($item->conversation->last_message->participation->messageable->id === auth()->user()->id)
                                                                            Vous:
                                                                        @else
                                                                            {{ $item->conversation->last_message->participation->messageable->gender === 'F' ? "Elle" : "Lui" }}:
                                                                        @endif

                                                                        {{ \Illuminate\Support\Str::limit($item->conversation->last_message->body, 21) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
