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
                    <h4>Data Penerima Bantuan</h4>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">Tambah
                            Data</button>
                    </div>
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
                                    <th>Action</th>
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
                                        <td class="text-center">
                                            <form action="{{ route('delete.penerima', $data->id) }}"
                                                onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-outline-primary btn-sm fa fa-eye" data-id="{{ $data->id }}" onclick="showDetail(this)"></button>
                                                <a href="{{ route('edit.penerima', $data->id) }}" type="button"
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

    <!-- Modal tambah penerima -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="formModalJenis"
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
                    <form action="{{ route('store.penerima') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" placeholder="Masukkan Nama" name="nama" required>
                                        @error('nama')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            id="nik" placeholder="Masukkan nik" name="nik" required>
                                        @error('nik')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                            name="gender" required>
                                            <option disabled selected value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                            name="jabatan" required>
                                            <option disabled selected value="">Pilih Jabatan</option>
                                            <option value="Ketua RW">Ketua RW</option>
                                            <option value="Ketua RT">Ketua RT</option>
                                            <option value="LPMK">LPMK</option>
                                            <option value="Pangruti Layon">Pangruti Layon</option>
                                            <option value="Modin">Modin</option>
                                            <option value="Tokoh Agama">Tokoh Agama</option>
                                            <option value="Pemimpin Tempat Ibadah">Pemimpin Tempat Ibadah</option>
                                            <option value="Penjaga Tempat Ibadah">Penjaga Tempat Ibadah</option>
                                            <option value="Penjaga Makam">Penjaga Makam</option>
                                        </select>
                                        @error('jabatan')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('rekening') is-invalid @enderror"
                                            id="rekening" placeholder="Masukkan Rekening" name="rekening" required>
                                        @error('rekening')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <select class="form-control @error('kelurahan') is-invalid @enderror"
                                            id="kelurahan" name="kelurahan" required>
                                            <option disabled selected value="">Pilih Kelurahan</option>
                                            <option value="Kelurahan Kanigoro">Kelurahan Kanigoro</option>
                                            <option value="Kelurahan Kelun">Kelurahan Kelun</option>
                                            <option value="Kelurahan Kartoharjo">Kelurahan Kartoharjo</option>
                                            <option value="Kelurahan Klegen">Kelurahan Klegen</option>
                                            <option value="Kelurahan Oro-Oro Ombo">Kelurahan Oro-Oro Ombo</option>
                                            <option value="Kelurahan Pilangbango">Kelurahan Pilangbango</option>
                                            <option value="Kelurahan Rejomulyo">Kelurahan Rejomulyo</option>
                                            <option value="Kelurahan Sukosari">Kelurahan Sukosari</option>
                                            <option value="Kelurahan Tawangrejo">Kelurahan Tawangrejo</option>
                                            <option value="Kelurahan Madiun Lor">Kelurahan Madiun Lor</option>
                                            <option value="Kelurahan Manguharjo">Kelurahan Manguharjo</option>
                                            <option value="Kelurahan Nambangan Kidul">Kelurahan Nambangan Kidul</option>
                                            <option value="Kelurahan Nambangan Lor">Kelurahan Nambangan Lor</option>
                                            <option value="Kelurahan Ngegong">Kelurahan Ngegong</option>
                                            <option value="Kelurahan Pangongangan">Kelurahan Pangongangan</option>
                                            <option value="Kelurahan Patihan">Kelurahan Patihan</option>
                                            <option value="Kelurahan Patihan">Kelurahan Patihan</option>
                                            <option value="Kelurahan Sogaten">Kelurahan Sogaten</option>
                                            <option value="Kelurahan Winongo">Kelurahan Winongo</option>
                                            <option value="Kelurahan Banjarejo">Kelurahan Banjarejo</option>
                                            <option value="Kelurahan Demangan">Kelurahan Demangan</option>
                                            <option value="Kelurahan Josenan">Kelurahan Josenan</option>
                                            <option value="Kelurahan Kejuron">Kelurahan Kejuron</option>
                                            <option value="Kelurahan Kuncen">Kelurahan Kuncen</option>
                                            <option value="Kelurahan Mojorejo">Kelurahan Mojorejo</option>
                                            <option value="Kelurahan Manisrejo">Kelurahan Manisrejo</option>
                                            <option value="Kelurahan Pandean">Kelurahan Pandean</option>
                                            <option value="Kelurahan Taman">Kelurahan Taman</option>
                                        </select>
                                        @error('kelurahan')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-lg-8">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" placeholder="Masukkan Alamat" name="alamat" required>
                                        @error('alamat')
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

    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="detailNama"></span></p>
                    <p><strong>NIK:</strong> <span id="detailNIK"></span></p>
                    <p><strong>Gender:</strong> <span id="detailGender"></span></p>
                    <p><strong>Jabatan:</strong> <span id="detailJabatan"></span></p>
                    <p><strong>Rekening:</strong> <span id="detailRekening"></span></p>
                    <p><strong>Kelurahan:</strong> <span id="detailKelurahan"></span></p>
                    <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showDetail(button) {
        var id = button.getAttribute("data-id");

        // Mendapatkan data detail menggunakan AJAX
        $.ajax({
            url: '/admin-penerima/detail/' + id,
            type: 'GET',
            success: function(response) {
                // Menampilkan data detail di dalam modal
                $('#detailNama').text(response.nama);
                $('#detailNIK').text(response.nik);
                $('#detailGender').text(response.gender);
                $('#detailJabatan').text(response.jabatan);
                $('#detailRekening').text(response.rekening);
                $('#detailKelurahan').text(response.kelurahan);
                $('#detailAlamat').text(response.alamat);

                // Membuka modal
                $('#modalDetail').modal('show');
            },
            error: function(xhr, status, error) {
                // Menangani kesalahan jika gagal mendapatkan data detail
                console.log(error);
            }
        });
    }
</script>
