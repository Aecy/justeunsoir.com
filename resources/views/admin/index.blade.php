@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1">
                <i class="fas fa-cog"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Trafic CPU</span>
                <span class="info-box-number">10<small>%</small></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ventes uniques</span>
                <span class="info-box-number">{{ number_format($orders->count(), 0, '.') }}</span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1">
                <i class="fas fa-user-check"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Utilisateurs connectés</span>
                <span class="info-box-number">{{ number_format($onlineUsers->count(), 0, '.') }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-users"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Utilisateurs enregistrés</span>
                <span class="info-box-number">{{ number_format($users->count(), 0, '.') }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Récapitulatif de {{ now()->translatedFormat('F Y') }}</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Ventes faite le {{ now()->translatedFormat('d F Y') }}</strong>
                    </p>
                    <div class="chart">
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Objectifs pour fin {{ now()->translatedFormat('F, Y') }}</strong>
                    </p>
                    <div class="progress-group">
                      @if($data['available_ndd'] >= $data['cost_ndd']) <i class="fas fa-check text-success"></i> @endif Nom de domaine
                      <span class="float-right"><b>{{ number_format($data['available_ndd'], 2) }} €</b><span class="text-muted"> / 100.00 €</span></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-{{ $data['available_ndd'] >= 50 ? 'success' : 'warning' }}"
                             style="width: {{ $data['available_ndd'] }}%"></div>
                      </div>
                    </div>
                    <div class="progress-group">
                      @if($data['available_host'] >= $data['cost_host']) <i class="fas fa-check text-success"></i> @endif Hébergeur web
                      <span class="float-right"><b>{{ number_format($data['available_host'], 2) }} €</b><span class="text-muted"> / 100.00 €</span></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-{{ $data['available_host'] >= 50 ? 'success' : 'warning' }}"
                             style="width: {{ $data['available_host'] }}%"></div>
                      </div>
                    </div>
                    @if($data['available_host'] >= $data['cost_host'] && $data['available_ndd'] >= $data['cost_ndd'])
                      <p class="text-muted pt-3">
                        La fin du mois de {{ now()->translatedFormat('F, Y') }} a de bon résultat. <br>
                        <span
                          class="text-success">Il y a <strong>{{ number_format($data['total_revenu'] -200, 2) }} €</strong> à partager.
                      </p>
                    @else
                      <p class="text-muted pt-3">
                        Les objectifs ne sont pas encore atteint ! <br>
                        Espérons que oui avant la fin du mois.
                      </p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h3>{{ number_format($data['total_revenu'], 2) }} €</h3>
                      <span class="description-text">REVENU TOTAL</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h3>{{ number_format($data['cost_ndd'] + $data['cost_host'], 2) }} €</h3>
                      <span class="description-text">COÛT TOTAL</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h3>{{ number_format($data['total_revenu'] - ($data['cost_ndd'] + $data['cost_host']), 2) }} €</h3>
                      <span class="description-text">PROFIT TOTAL</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <h3>
                        @if($data['available_ndd'] >= $data['cost_ndd'] && $data['available_host'] >= $data['cost_host'])
                          <i class="fas fa-check text-success"></i>
                        @else
                          <i class="fas fa-exclamation-triangle text-warning"></i>
                        @endif
                      </h3>
                      <span class="description-text">OBJECTIFS</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Achats de crédits</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pack</th>
                      <th>Prix</th>
                      <th>Statut</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                      <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ number_format($order->price / 100, 2) }} €</td>
                        <td>
                          @if($order->status === \App\Enums\Order\OrderStatusEnum::CANCELLED)
                            <span class="badge badge-danger">Annulé</span>
                          @elseif($order->status === \App\Enums\Order\OrderStatusEnum::PENDING)
                            <span class="badge badge-secondary">En attente</span>
                          @elseif($order->status === \App\Enums\Order\OrderStatusEnum::VALIDATED)
                            <span class="badge badge-success">Validé</span>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Voir tout</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Les packs disponibles</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($products as $product)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{ asset('admin/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{ $product->name }}
                          <span
                            class="badge badge-warning float-right">{{ number_format($product->price / 100, 2) }} €</span>
                        </a>
                        <span class="product-description">
                          {{ $product->credits }} crédits
                        </span>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Voir tout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
