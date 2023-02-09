
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('admin.index') }}" class="brand-link">
    <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ $user->avatar_url }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $user->name }}</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Tableau de bord</p>
          </a>
        </li>

        <li class="nav-header">UTILISATEURS</li>
        <li class="nav-item">
          <a href="{{ route('admin.user.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Voir les utilisateurs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.user.buy') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>Achats des utilisateurs</p>
          </a>
        </li>

        <li class="nav-header">PACKS</li>
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Voir les packs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>Créer un pack</p>
          </a>
        </li>

        <li class="nav-header">PAGES</li>
        <li class="nav-item">
          <a href="{{ route('admin.question.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Foire aux questions</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
