<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIAPBOS - Sistem Penerimaan Bansos</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('otika') }}/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('otika') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ url('otika') }}/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ url('otika') }}/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='{{ url('otika') }}/assets/img/favicon.ico' />

  @section('css')
  @show
  @yield('css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        {{-- Navbar Header --}}
        @include('layout.header')
        {{-- Sidebar --}}
        @include('layout.sidebar')
        {{-- content --}}
        @yield('content')
        {{-- Footer --}}
        @include('layout.footer')
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ url('otika') }}/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="{{ url('otika') }}/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="{{ url('otika') }}/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="{{ url('otika') }}/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="{{ url('otika') }}/assets/js/custom.js"></script>

  @section('js')
  @show
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>