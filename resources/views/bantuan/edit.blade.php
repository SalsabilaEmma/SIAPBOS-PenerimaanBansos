@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Bantuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.bantuan', $bantuan->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Penerima</label>
                                    <select class="form-control" name="idPenerima">
                                        <option disabled selected  value="{{ $bantuan->idPenerima }}">{{ $bantuan->penerima->nama . ' - ' . $bantuan->penerima->jabatan .' - ' . $bantuan->penerima->kelurahan}}</option>
                                        @foreach ($penerima as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->nama . ' - ' . $data->jabatan . ' - ' . $data->kelurahan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend datepicker"></div>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ $bantuan->tanggal }}" required>
                                        @error('tanggal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Bantuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <select class="form-control @error('jenisBantuan') is-invalid @enderror"
                                            id="jenisBantuan" name="jenisBantuan" required>
                                            <option disabled selected value="{{ $bantuan->jenisBantuan }}">{{ $bantuan->jenisBantuan }}</option>
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
                                            id="jumlah" placeholder="Masukkan Jumlah" name="jumlah" value="{{ $bantuan->jumlah }}" required>
                                        @error('jumlah')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Upload Bukti Trasfer</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bukti" name="bukti">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('bantuan') }}" class="btn btn-secondary m-t-15 waves-effect">Cancel</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
