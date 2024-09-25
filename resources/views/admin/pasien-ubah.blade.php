@extends('components.admin-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/pasien/' . $dataPasien->id_pasien) }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Kode Pasien :</label>
                    <div class="col-12">
                        <input type="text" name="kode_pasien" class="form-control border border-dark"
                            value="{{ $dataPasien->kode_pasien }}" disabled>
                    </div>
                    @error('kode_pasien')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nama Pasien :</label>
                    <div class="col-12">
                        <input type="text" name="nama_pasien" class="form-control border border-dark"
                            value="{{ $dataPasien->nama_pasien }}">
                    </div>
                    @error('nama_pasien')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Alamat :</label>
                    <div class="col-12">
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control border border-dark">{{ $dataPasien->alamat }}</textarea>
                    </div>
                    @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nomor Telepon :</label>
                    <div class="col-12">
                        <input type="tel" name="no_telepon" class="form-control border border-dark"
                            value="{{ $dataPasien->no_telepon }}">
                        @error('no_telepon')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form form-group row">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Tanggal Lahir :</label>
                    <div class="col-12">
                        <input class="form-control border border-dark" type="date" name="tgl_lahir"
                            value="{{ $dataPasien->tgl_lahir }}"><br>
                        @error('tgl_lahir')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form form-group row mb-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Jenis Kelamin :</label>
                    <div class="col-12">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradio1" value="Laki-laki"
                                autocomplete="off" {{ $dataPasien->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="btn btn-outline-success" for="btnradio1">Laki-laki</label>
                            <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradio2" value="Perempuan"
                                autocomplete="off" {{ $dataPasien->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                            <label class="btn btn-outline-success" for="btnradio2">Perempuan</label>
                        </div><br>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button class="btn btn-warning btn-sm">Ubah Data</button>
            </form>
        </div>
    </div>
@endsection
