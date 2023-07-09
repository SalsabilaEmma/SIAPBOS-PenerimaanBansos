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
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('pdf.bantuan') }}" method="POST" target="_blank">
                                @csrf
                                <div class="form-group">
                                    <select name="tahun" class="form-control">
                                        <option disabled selected value="">Cari Tahun</option>
                                        @foreach ($tahunList as $tahun)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Cetak PDF</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paket">Tambah
                                    Data</button>
                            </form>
                        </div>
                        {{-- <div class="col-md-6 text-right" style="margin-top:20px">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paket">Tambah
                                Data</button>
                        </div> --}}
                    </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- <tbody></tbody> --}}
                            <tbody>
                                @foreach ($bantuan as $no => $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->penerima->nama ?? '' }}</td>
                                        <td>{{ $data->penerima->jabatan ?? '' }}</td>
                                        <td>{{ $data->penerima->kelurahan ?? '' }}</td>
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
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Penerima</label>
                                    <select class="form-control" name="idPenerima">
                                        <option disabled selected value="">Pilih Penerima</option>
                                        @foreach ($penerima as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->nama . ' - ' . $data->jabatan . ' - ' . $data->kelurahan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend datepicker"></div>
                                        {{-- <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" placeholder="Masukkan Tanggal" name="tanggal" required> --}}
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" required>
                                        @error('tanggal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
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
                            <div class="col-sm-6 col-lg-6">
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
        $(document).ready(function() {
            var table = $('#bantuanTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('bantuan.get') }}",
                    type: "GET",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'kelurahan',
                        name: 'kelurahan'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'jenisBantuan',
                        name: 'jenisBantuan'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                }
            });
        });
    </script>
    {{-- <script>
        var table;

        $(document).ready(function() {
            // DataTable
            table = $('#bantuanTable').DataTable({
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
    </script> --}}
@endsection
