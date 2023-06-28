<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>SIAPBOS - Sistem Penerimaan Bansos</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('otika') }}/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('otika') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('otika') }}/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ url('otika') }}/assets/css/custom.css">
    <link rel="stylesheet" href="{{ url('otika') }}/assets/bundles/chocolat/dist/css/chocolat.css">
    <link rel="stylesheet" href="{{ url('otika') }}/assets/bundles/datatables/datatables.min.css">
    {{-- <link rel="stylesheet" href="{{ url('otika') }}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css"> --}}
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
    <!-- Tambahkan skrip jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ url('otika') }}/assets/bundles/datatables/datatables.min.js"></script>
    <script src="{{ url('otika') }}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script> --}}
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

    <script src="{{ url('otika') }}/assets/bundles/datatables/datatables.min.js"></script>
    <script src="{{ url('otika') }}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ url('otika/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('otika/assets/js/page/datatables.js') }}"></script>
    <script src="{{ url('otika') }}/assets/bundles/summernote/summernote-bs4.js"></script>
    @section('js')
    @show
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
