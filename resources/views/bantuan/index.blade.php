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
                    <h4>Data Bantuan</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paket">Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped thisTable" id="thisTable" style="width:100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Bantuan</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bantuan as $no => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                        <td>{{ $data->jenisBantuan }}</td>
                                        <td>Rp {{ number_format($data->jumlah, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('delete.bantuan', $data->id) }}"
                                                onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                                @csrf
                                                <a href="{{ route('edit.bantuan', $data->id) }}" type="button"
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

    <!-- Modal tambah bantuan -->
    <div class="modal fade" id="paket" tabindex="-1" role="dialog" aria-labelledby="formModalJenis"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalJenis">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.bantuan') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        {{-- <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" placeholder="Masukkan Tanggal" name="tanggal" required> --}}
                                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required>
                                        @error('tanggal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label>Jenis Bantuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <select class="form-control @error('jenisBantuan') is-invalid @enderror"
                                            id="jenisBantuan" name="jenisBantuan" required>
                                            <option disabled selected value="">Pilih Jenis Bantuan</option>
                                            <option value="Uang">Uang</option>
                                            <option value="Sembako">Sembako</option>
                                        </select>
                                        @error('jenisBantuan')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            id="jumlah" placeholder="Masukkan Jumlah" name="jumlah" required>
                                        @error('jumlah')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script>
        var table;

        $(document).ready(function() {
            // DataTable
            table = $('.thisTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('bantuan.get') }}",
                columns: [{
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'tanggal',
                        name: 'Tanggal',
                        className: 'text-center',
                    },
                    {
                        data: 'jenisBantuan',
                        name: 'Jenis Bantuan',
                    },
                    {
                        data: 'jumlah',
                        name: 'Jumlah',
                        className: 'text-center',
                    },
                    {
                        data: 'id',
                        searchable: false,
                        orderable: false,
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            const rowData = JSON.stringify(row);
                            return `
                                <div class="btn-group" role="group">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="/bantuan/delete/${row.id}" method="POST">
                                        <a class="btn btn-xs btn-outline-warning btn-edit" data-id="${row.id}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-delete" type="submit"><a class="btn btn-xs btn-outline-danger btn-delete">Delete</a></button>
                                    </form>
                                </div>`;
                        }
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                rowCallback: function(row, data, index) {
                    $('td:eq(0)', row).html(index + 1);
                }
            });
        });
    </script>
@endsection
