<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | Administration</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('partials.admin._nav')
    @include('partials.admin._aside')
    @yield('content')
    @include('partials.admin._footer')
  </div>
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('admin/js/adminlte.js') }}"></script>
  <script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/js/demo.js') }}"></script>
  <script src="{{ asset('admin/js/pages/dashboard2.js') }}"></script>
</body>
</html>
