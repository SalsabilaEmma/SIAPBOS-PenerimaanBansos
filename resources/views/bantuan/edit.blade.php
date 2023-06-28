@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="modal-body">
                    <form action="{{ route('update.bantuan', $bantuan->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        {{-- <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                            id="tahun" placeholder="Masukkan Tahun" name="tahun" required> --}}
                                        <select class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                            name="tahun" value="{{ $bantuan->tahun }}"> required>
                                            <option value="{{ $bantuan->tahun }}">{{ $bantuan->tahun }}</option>
                                            @php
                                                $currentYear = date('Y');
                                                $startYear = $currentYear - 15; // Ubah angka 10 sesuai dengan jumlah tahun yang ingin Anda tampilkan
                                                for ($year = $startYear; $year <= $currentYear; $year++) {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                            @endphp
                                        </select>

                                        @error('tahun')
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
                                            <option disabled selected value="{{ $bantuan->jenisBantuan }}">
                                                {{ $bantuan->jenisBantuan }}</option>
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
                                            id="jumlah" placeholder="Masukkan Jumlah" name="jumlah"
                                            value="{{ $bantuan->jumlah }}" required>
                                        @error('jumlah')
                                            <small>{{ $message }}</small>
                                        @enderror
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
