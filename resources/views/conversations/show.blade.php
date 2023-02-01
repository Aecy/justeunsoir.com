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
                                        <div class="d-flex justify-content-between align-items-center info-card-title">
                                            <h6>Conversation avec
                                                @foreach($conversation->getParticipants() as $participant)
                                                    @if($participant->name !== auth()->user()->name)
                                                        {{ $participant->name }}
                                                    @endif
                                                @endforeach et vous
                                            </h6>
                                            <a class="btn btn-primary" href="{{ route('conversations.index') }}">Retournez à vos conversations</a>
                                        </div>
                                        <div class="info-card-content">
                                            <div class="messages" id="chat">
                                                <ul class="messages__list">
                                                    @foreach($conversation->messages()->get() as $message)
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
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @if(auth()->user()->credits === 0)
                                                <div class="alert alert-danger mt-4">
                                                    Vous n'avez pas assez de crédits pour répondre ! <a class="text-primary" href="{{ route('shop.index') }}">Cliquez ici pour en acheter</a>
                                                </div>
                                            @else
                                                <div class="activity-tab">
                                                    <div class="create-post">
                                                        <div class="lab-inner">
                                                            <div class="lab-content">
                                                                <form action="{{ route('conversations.message', $conversation) }}" method="post" class="post-form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="text" placeholder="Entrez votre message ici" name="content" autocomplete="off">
                                                                    <div class="content-type">
                                                                        <ul class="content-list">
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
