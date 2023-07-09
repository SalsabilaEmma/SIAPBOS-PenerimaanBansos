@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-12">
                                        <div class="card-content">
                                            <a href="{{ route('pimpinan.penerima') }}">
                                                <h4>Lihat Seluruh Data Penerima</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-12">
                                        <div class="card-content">
                                            <a href="{{ route('pimpinan.bantuan') }}">
                                                <h4>Lihat Seluruh Data Bantuan</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Total Bantuan</h4>
            <div class="row ">
                @foreach ($totalsPerYear as $year => $total)
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15">Tahun {{ $year }}</h5>
                                                <h2 class="mb-3 font-18">Rp {{ number_format($total, 0, ',', '.') }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
