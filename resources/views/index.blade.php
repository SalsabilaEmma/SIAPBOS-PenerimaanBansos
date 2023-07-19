@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content"
        style="background-image: url('{{ url('image') }}/bg2.png'); background-size: cover;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9);">
        </div>
        <section class="section">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <img src="{{ url('image') }}/Lambang_Kota_Madiun.png" style="width: 120px; height:135px"
                    alt="Lambang Kota Madiun">
                <div style="margin-left:50px;">
                    <h2 style=" margin-top: 35px">SIAPBOS - Sistem Pengelolaan Bantuan Sosial</h2><br>
                    <h4 style=" margin-top: -20px">M. Niosa</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left: 35%; margin-top: 5%">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card-content text-center">
                                            <h4>Login</h4>
                                            <a href="{{ route('login') }}">Klik di sini untuk login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
