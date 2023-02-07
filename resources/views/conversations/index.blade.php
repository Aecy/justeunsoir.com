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
                                    <img src="{{ $participant->messageable->avatar_url }}" alt="img" style="height: 70px; width: 70px;  border-radius: 50%;">
                                  @endif
                                @endforeach
                              </div>
                              <div class="d-flex align-items-center">
                                <div>
                                  <a href="{{ route('conversations.show', $item->conversation_id) }}" class="me-2">
                                    @forelse($item->conversation->participants as $participant)
                                      @if($participant->messageable->name !== auth()->user()->name)
                                        @include('partials._user-online', ['userId' => $participant->messageable->id])
                                        <span class="fw-bolder" title="{{ $participant->messageable->name }}">
                                          {{ \Illuminate\Support\Str::limit($participant->messageable->name, 30) }}
                                        </span>
                                      @endif
                                    @empty
                                      <span></span>
                                    @endforelse
                                  </a>
                                  <form id="conversation_delete-{{ $item->conversation_id }}" action="{{ route('conversations.delete', $item) }}" method="post" style="display: none;">
                                    @csrf
                                    @method('delete')
                                  </form>
                                  <a href="#!" onclick="event.preventDefault(); document.getElementById('conversation_delete-{{ $item->conversation_id }}').submit()" class="text-muted" style="font-size: 12px;">
                                    <i class="icofont-trash"></i> Supprimer la conversation
                                  </a>
                                  <p class="text-muted">
                                    @if(!is_null($item->conversation->last_message))
                                      @if($item->conversation->last_message->type === 'like')
                                        @if($item->conversation->last_message->participation->messageable->id === auth()->user()->id)
                                          Vous avez envoyé un coeur
                                        @else
                                          {{ $item->conversation->last_message->participation->messageable->gender === 'F' ? "Elle" : "Lui" }}
                                          : A envoyé un coeur
                                          @endif &middot;
                                          {{ $item->conversation->last_message->created_at->diffForHumans() }}
                                          @else
                                            @if($item->conversation->last_message->participation->messageable->id === auth()->user()->id)
                                              Vous:
                                            @else
                                              {{ $item->conversation->last_message->participation->messageable->gender === 'F' ? "Elle" : "Lui" }}:
                                            @endif
                                              {{ \Illuminate\Support\Str::limit($item->conversation->last_message->body, 30) }} &middot;
                                              {{ $item->conversation->last_message->created_at->diffForHumans() }}
                                        @endif
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
                        Vous n'avez pas de conversation... Commencez à discuter en
                        <a href="{{ route('search.index') }}" class="text-primary">
                          cliquant ici
                        </a>
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
