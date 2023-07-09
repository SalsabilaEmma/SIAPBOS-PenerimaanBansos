@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10%">
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
                <img src="{{ url('image') }}/Lambang_Kota_Madiun.png" style="width: 25%" alt="Lambang Kota Madiun">
            </div>
        </section>
    </div>
@endsection
