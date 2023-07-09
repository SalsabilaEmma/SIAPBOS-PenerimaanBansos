@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row ">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <div class="card">
                        <div class="card-statistic-2">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-12">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4>Data Penerima</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-striped" style="width:100%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIK</th>
                                                                <th>Jabatan</th>
                                                                <th>Kelurahan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($penerima as $no => $data)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td>{{ $data->nama }}</td>
                                                                    <td>{{ $data->nik }}</td>
                                                                    <td>{{ $data->jabatan }}</td>
                                                                    <td>{{ $data->kelurahan }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-right">
                                                    <a href="{{ route('staff.penerima') }}" style="margin-right:10px">Selengkapnya ...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="card-statistic-2">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-12">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4>Data Bantuan</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-sm" style="width:100%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No</th>
                                                                <th>Nama Penerima</th>
                                                                <th>Jabatan</th>
                                                                <th>Kelurahan</th>
                                                                <th>Tanggal</th>
                                                                <th>Jenis Bantuan</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($bantuan as $no => $data)
                                                                <tr>
                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td>{{ $data->penerima->nama ?? ''}}</td>
                                                                    <td>{{ $data->penerima->jabatan ?? ''}}</td>
                                                                    <td>{{ $data->penerima->kelurahan ?? ''}}</td>
                                                                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                                                    <td>{{ $data->jenisBantuan }}</td>
                                                                    <td>Rp {{ number_format($data->jumlah, 0, ',', '.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-right">
                                                    <a href="{{ route('staff.bantuan') }}" style="margin-right:10px">Selengkapnya ...</a>
                                                </div>
                                            </div>
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
