@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Utilisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Utilisateurs</a></li>
              <li class="breadcrumb-item active">Achats des utilisateurs</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <form action="{{ route('admin.user.index') }}" method="get" class="form-inline">
                <input type="text" class="form-control ml-2" placeholder="Rechercher avec un nom..." name="name" value="{{ old('name', request()->name) }}">
                <button type="submit" class="btn btn-primary ml-2">
                  <i class="fa fa-search"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
              <tr>
                <th>#</th>
                <th>Acheteur</th>
                <th>Nom du pack</th>
                <th>Prix</th>
                <th>Crédit</th>
                <th>Moyen de paiement</th>
                <th>Statut du paiement</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @forelse($orders as $order)
              <tr>
                <td>#{{ $order->id }}</td>
                <td>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar mr-2" src="{{ $order->user->avatar_url }}">
                      <a href="{{ route('users.show', $order->user) }}">{{ $order->user->name }}</a>
                    </li>
                  </ul>
                </td>
                <td>{{ $order->product->name }}</td>
                <td>{{ number_format($order->price / 100, 2) }} €</td>
                <td>Achat de {{ $order->product->credits }} crédits</td>
                <td>
                  <span class="badge badge-secondary">{{ $order->provider->name }}</span>
                </td>
                <td>
                  <span class="badge badge-{{ $order->status->color() }}">{{ $order->status->name }}</span>
                </td>
                <td></td>
              </tr>
              @empty
                <tr>
                  <td colspan=""></td>
                </tr>
              @endforelse
              </tbody>
            </table>

            <div class="px-4 py-1">
              {{ $orders->links('vendor.pagination.bootstrap-5') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')

@endpush
