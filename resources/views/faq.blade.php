@extends('layouts.master', ['title' => "Foire aux questions"])

@section('content')
  <section class="pricing-section padding-tb">
    <div class="container">
      <div class="section-header">
        <h2 class="theme-color">Foire aux questions</h2>
        <h4>Les questions fréquemment posées</h4>
      </div>
      <div class="section-wrapper mt-4">
        <div class="pricing-plan-wrapper">
          @foreach($questions as $question)
            <h5>{{ $question->title }}</h5>
            <p>{{ $question->content }}</p>
            <hr class="text-muted">
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
