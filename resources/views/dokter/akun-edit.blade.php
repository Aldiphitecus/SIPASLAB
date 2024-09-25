@extends('components.dokter-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('dokter/akun/' . $user->id_user) }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form form-group row my-4">
                    <div class="col-12">
                        <label class="col-11 control-label text-sm col-form-label fw-bold">Role :</label>
                        <input type="hidden" name="role" value="{{ $user->role }}">
                        <input type="text" class="form-control border border-dark" value="{{ $user->role }}" disabled>
                    </div>
                    @error('role')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nama :</label>
                    <div class="col-12">
                        <input type="text" name="nama_user" class="form-control border border-dark"
                            value="{{ $user->nama_user }}">
                        <i>Catatan: Harap masukan kode diawali dengan 'Dr.'</i>
                    </div>
                    @error('nama_user')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Username :</label>
                    <div class="col-12">
                        <input type="text" name="username" class="form-control border border-dark"
                            value="{{ $user->username }}">
                    </div>
                    @error('username')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Password :</label>
                    <div class="col-12">
                        <input type="password" name="password" class="form-control border border-dark">
                    </div>
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button class="btn btn-warning btn-sm">Ubah Data</button>
            </form>
        </div>
    </div>
@endsection
