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
              <li class="breadcrumb-item active">Créer une question / réponse</li>
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
                <h3 class="card-title">Créer une question / réponse</h3>
              </div>
              <form action="{{ route('admin.question.store') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Titre de la question</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="content">Réponse de la question</label>
                    <textarea name="content" id="content" cols="30" rows="4" class="form-control @error('title') is-invalid @enderror">{{ old('content') }}</textarea>
                    @error('content')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Créer une question / réponse</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
