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
                                        <div class="d-flex gap-3 align-items-center info-card-title">
                                            <a class="text-primary" href="{{ route('conversations.index') }}" title="Retourner à vos conversations">
                                                <i class="icofont-double-left"></i>
                                            </a>
                                            <div class="d-flex align-items-center gap-2">
                                                @foreach($conversation->getParticipants() as $participant)
                                                    @if($participant->name !== auth()->user()->name)
                                                        <img src="{{ $participant->avatar_url }}" style="height: 45px; border-radius: 50%" alt="">
                                                        <div class="d-block">
                                                            <div class="fw-bolder">
                                                                @if(Cache::has('users_online-' . $participant->id))
                                                                    <i class="icofont-ui-press text-success text-sm circle pulse"></i>
                                                                @else
                                                                    <i class="icofont-ui-press text-danger text-sm"></i>
                                                                @endif
                                                                {{ $participant->name }}
                                                            </div>
                                                            <div class="text-muted" style="font-size: 13px;">
                                                                @if(Cache::has('users_online-' . $participant->id))
                                                                    En ligne maintenant
                                                                @else
                                                                    @if(is_null($participant->last_seen))
                                                                        Hors ligne depuis longtemps
                                                                    @else
                                                                        En ligne {{ $participant->last_seen->diffForHumans() }}
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="info-card-content">
                                            <div class="messages" id="chat">
                                                <ul class="messages__list">
                                                    @foreach($conversation->messages()->get() as $message)
                                                        @if($message->type === 'like')
                                                            <li class="like">
                                                                <div class="messages__item" style="text-align: center;">
                                                                    <span class="text-danger">❤</span>
                                                                    <span>
                                                                        @if(auth()->user()->id === $message->sender->id)
                                                                            Vous avez envoyé un coeur
                                                                        @else
                                                                            <a href="{{ route('users.show', $message->sender) }}" class="fw-bolder">
                                                                                {{ $message->sender->name }}
                                                                            </a> vous a envoyé un coeur
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li class="{{ $message->sender->id == auth()->user()->id ? 'self' : 'other' }}">
                                                                <div class="messages__item">
                                                                    <div class="{{ $message->sender->id == auth()->user()->id ? 'messages__time_self' : 'messages__time' }}">
                                                                        {{ $message->created_at->diffForHumans() }}
                                                                    </div>
                                                                    <div class="messages__content">
                                                                        <span>{{ $message->body }}</span>
                                                                        @if($message->type === 'image')
                                                                            <img style="border-radius: 15px; padding-top: 8px;" src="{{ asset('/storage/' . $message->data['file_url']) }}" alt="">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @if(auth()->user()->credits === 0 && auth()->user()->role === 'member')
                                                <div class="alert alert-danger mt-4">
                                                    Vous n'avez pas assez de crédits pour répondre ! <a class="text-primary" href="{{ route('shop.index') }}">Cliquez ici pour en acheter</a>
                                                </div>
                                            @else
                                                <div class="activity-tab">
                                                    <div class="create-post">
                                                        <div class="lab-inner">
                                                            <div class="lab-content">
                                                                <form action="{{ route('messages.store', $conversation) }}" method="post" class="post-form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="text" class="is-invalid" placeholder="Entrez votre message ici" name="content" autocomplete="off">
                                                                    <div class="content-type">
                                                                        <ul class="content-list">
                                                                            <li class="text">
                                                                                <a href="#">
                                                                                    <i class="icofont-star"></i>
                                                                                    @if(auth()->user()->role === 'member')
                                                                                        Vous avez <strong>{{ auth()->user()->credits }} crédits</strong> disponible
                                                                                    @else
                                                                                        Vous avez des crédits illimités
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                            <li class="image-video">
                                                                                <div class="file-btn">
                                                                                    <i class="icofont-camera"></i>
                                                                                    Ajouter une photo
                                                                                </div>
                                                                                <input type="file" name="image">
                                                                            </li>
                                                                            <li class="post-submit">
                                                                                <input type="submit" value="Envoyer" class="lab-btn">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
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
    <script type="text/javascript">
        let chat = document.getElementById('chat');
        chat.scrollTop = chat.scrollHeight;
    </script>
@endpush
