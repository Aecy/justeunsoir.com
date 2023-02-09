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
              <li class="breadcrumb-item active">Utilisateurs</li>
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
                <th style="width: 10%">#</th>
                <th style="width: 20%">Utilisateur</th>
                <th style="">Sexualité</th>
                <th style="width: 20%" class="text-center">Rôle</th>
                <th>Statut complétion</th>
                <th style="width: 20%"></th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
              <tr>
                <td>#{{ $user->id }}</td>
                <td>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar mr-2" src="{{ $user->avatar_url }}">
                      <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                    </li>
                  </ul>
                </td>
                <td>{{ $user->gender->name }}</td>
                <td class="project-state">
                  <span class="badge badge-{{ $user->role === \App\Enums\User\UserRolesEnum::ADMIN ? 'danger' : 'success' }}">
                    {{ trans("messages.roles.{$user->role->value}") }}
                  </span>
                </td>
                <td class="project_progress">
                  <div class="progress rounded progress-sm">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $user->completionPercentage() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->completionPercentage() }}%"></div>
                  </div>
                  <small>
                    Complété à {{ $user->completionPercentage() }}%
                  </small>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user) }}">
                    <i class="fas fa-folder">
                    </i>
                    Voir
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>

            <div class="px-4 py-1">
              {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')

@endpush
