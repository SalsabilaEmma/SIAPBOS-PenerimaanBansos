@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data User</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.user', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Masukkan Nama" name="name" value="{{ $user->name }}" required>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"></div>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role"
                                            name="role" required>
                                            <option disabled selected value="{{ $user->role }}">{{ $user->role }}</option>
                                            <option value="admin">Admin</option>
                                            <option value="staff">Staff</option>
                                            <option value="pimpinan">Pimpinan</option>
                                        </select>
                                        @error('role')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('user') }}" class="btn btn-secondary m-t-15 waves-effect">Cancel</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
