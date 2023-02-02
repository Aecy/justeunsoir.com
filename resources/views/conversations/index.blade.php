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
                                        @forelse($conversations as $item)
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
                                                                        @forelse($item->conversation->participants as $participant)
                                                                            @if($participant->messageable->name !== auth()->user()->name)
                                                                                @if(Cache::has('users_online-' . $participant->messageable->id))
                                                                                    <i class="icofont-ui-press text-success text-sm circle pulse"></i>
                                                                                @else
                                                                                    <i class="icofont-ui-press text-danger text-sm"></i>
                                                                                @endif
                                                                                <span class="fw-bolder" title="{{ $participant->messageable->name }}">
                                                                                    {{ \Illuminate\Support\Str::limit($participant->messageable->name, 30) }}
                                                                                </span>
                                                                            @endif
                                                                            @empty
                                                                            test
                                                                        @endforelse
                                                                    </a>
                                                                    <p class="text-muted">
                                                                        @if(!is_null($item->conversation->last_message))
                                                                            @if($item->conversation->last_message->participation->messageable->id === auth()->user()->id)
                                                                                Vous:
                                                                            @else
                                                                                {{ $item->conversation->last_message->participation->messageable->gender === 'F' ? "Elle" : "Lui" }}:
                                                                            @endif
                                                                            {{ \Illuminate\Support\Str::limit($item->conversation->last_message->body, 30) }} &middot;
                                                                            {{ $item->conversation->last_message->created_at->diffForHumans() }}
                                                                        @else
                                                                            Nouvelle conversation ! Ne soyez pas timide.
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="p-4">
                                                Vous n'avez pas de conversation...
                                                Commencez à discuter en <a href="{{ route('search.index') }}" class="text-primary">cliquant ici</a>
                                            </div>
                                        @endforelse
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

@push('scripts')
@endpush
