@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <a href="{{ route('pimpinan') }}">
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
                </div>
            </div>
        </div>
    </div>
