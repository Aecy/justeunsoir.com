@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Foire aux questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
              <li class="breadcrumb-item active">Foire aux questions</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="accordion">
            @foreach($questions as $question)
              <div class="card">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $question->id }}" aria-expanded="false">
                  <div class="card-header">
                    <h4 class="card-title w-100">{{ $question->id }}. {{ $question->title }}</h4>
                  </div>
                </a>
                <div id="collapse{{ $question->id }}" class="collapse" data-parent="#accordion" style="">
                  <div class="card-body">{{ $question->content }}</div>
                  <div class="card-footer">
                    <a href="{{ route('admin.question.edit', $question) }}" class="btn btn-info"><i class="fa fa-edit"></i> Modifier</a>
                    <form method="post" action="{{ route('admin.question.delete', $question) }}" class="justify-content-end d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="text-center">
              <a href="{{ route('admin.question.create') }}" class="btn btn-info">Créer une question / réponse.</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')

@endpush
