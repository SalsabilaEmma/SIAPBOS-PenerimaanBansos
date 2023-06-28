@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Penerima Bantuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.penerima', $penerima->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" placeholder="Masukkan Nama" name="nama" value="{{ $penerima->nama }}" required>
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
                                            id="nik" placeholder="Masukkan nik" name="nik" value="{{ $penerima->nik }}" required>
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
                                            <option disabled selected value="{{ $penerima->gender }}">{{ $penerima->gender }}</option>
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
                                            <option disabled selected value="{{ $penerima->jabatan }}">{{ $penerima->jabatan }}</option>
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
                                            id="rekening" placeholder="Masukkan Rekening" name="rekening" value="{{ $penerima->rekening }}" required>
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
                                        <select class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan"
                                            name="kelurahan" required>
                                            <option disabled selected value="{{ $penerima->kelurahan }}">{{ $penerima->kelurahan }}</option>
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
                                            id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ $penerima->alamat }}" required>
                                        @error('alamat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('penerima') }}" class="btn btn-secondary m-t-15 waves-effect">Cancel</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
