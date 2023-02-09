@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Créer un pack</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Packs</a></li>
              <li class="breadcrumb-item active">Créer un pack</li>
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
                <h3 class="card-title">Créer un pack</h3>
              </div>
              <form action="{{ route('admin.product.store') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Titre du pack<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Prix du pack<span class="text-danger">*</span>
                      <small class="text-muted">Prix du pack en euros: <span id="show-current-price">0</span>
                      </small>
                    </label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                           name="price" value="{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="credits">Nombre de crédits<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('credits') is-invalid @enderror" id="credits"
                           name="credits" value="{{ old('credits') }}">
                    @error('credits')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Créer le pack</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    let inputPriceElement = document.getElementById('price');
    let currentPriceElement = document.getElementById('show-current-price');

    currentPriceElement.innerText = toEuros(inputPriceElement.value);

    inputPriceElement.addEventListener('input', function (event) {
      const target = event.target;
      const value = target.value;

      currentPriceElement.innerText = toEuros(value);
    });

    function toEuros(number) {
      return new Intl.NumberFormat('fr-FR', {style: 'currency', currency: 'EUR'}).format(number / 100);
    }
  </script>
@endpush
