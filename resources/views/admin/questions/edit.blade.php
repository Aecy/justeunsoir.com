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
              <li class="breadcrumb-item"><a href="{{ route('admin.question.index') }}">Foire aux questions</a></li>
              <li class="breadcrumb-item active">Modification de {{ $question->title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modification de {{ $question->title }}</h3>
              </div>
              <form action="{{ route('admin.question.update', $question) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Titre de la question</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $question->title) }}">
                  </div>
                  <div class="form-group">
                    <label for="content">Réponse de la question</label>
                    <textarea name="content" id="content" cols="30" rows="4" class="form-control">{{ old('content', $question->content) }}</textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
