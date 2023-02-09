@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Packs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
              <li class="breadcrumb-item active">Packs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @foreach($products as $product)
            <div class="col-4">
              <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                      <h4>{{ $product->name }}</h4>
                      <span class="badge badge-warning text-uppercase">{{ number_format($product->price / 100, 2) }} €</span>
                      <span class="badge badge-success text-uppercase">{{ $product->credits }} crédits</span>
                    </div>
                    <div class="text-center mt-4">
                      <form action="{{ route('admin.product.delete', $product) }}" method="post" class="d-inline-flex">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-primary mr-2">
                          <i class="fa fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="text-center">
          <a href="{{ route('admin.product.create') }}" class="btn btn-info">Créer un nouveau pack.</a>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')

@endpush
