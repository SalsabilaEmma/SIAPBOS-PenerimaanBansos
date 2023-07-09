@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row ">
                @foreach ($totalJabatan as $jabatan => $totalJ)
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15"> {{ $jabatan }}</h5>
                                                <h2 class="mb-3 font-18">{{ $totalJ }} Data</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <br><hr><br>
                @foreach ($totals as $kelurahan => $total)
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15">{{ $kelurahan }}</h5>
                                                <h2 class="mb-3 font-18">{{ $total }} Data</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </section>
    </div>
@endsection
