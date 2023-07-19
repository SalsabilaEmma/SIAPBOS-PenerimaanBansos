@extends('layout.app')
@section('content')
    <div class="main-content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data User</h4>
                </div>
                {{-- <div class="card-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">Tambah
                            Data</button>
                    </div>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $no => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->role }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('delete.user', $data->id) }}"
                                                onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                                @csrf
                                                <a href="{{ route('edit.user', $data->id) }}" type="button"
                                                    class="btn btn-outline-warning btn-sm fa fa-pen"></a>
                                                <button class="btn btn-outline-danger btn-sm fa fa-trash" type="submit">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
