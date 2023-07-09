@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <a href="{{ route('staff') }}">
                <button type="button" class="btn btn-secondary" style="margin-bottom: 10px">Kembali</button>
            </a>
            <div class="card">
                <div class="card-header">
                    <h4>Data Penerima Bantuan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%;">
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
                </div>
            </div>
        </div>
    </div>
