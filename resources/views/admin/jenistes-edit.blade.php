@extends('components.admin-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/jenistes/update/' . $data->id_tes) }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nama Tes :</label>
                    <div class="col-12">
                        <input type="text" name="nama_tes" class="form-control border border-dark"
                            value="{{ $data->nama_tes }}">
                    </div>
                    @error('nama_tes')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Deskripsi Tes :</label>
                    <div class="col-12">
                        <textarea name="deskripsi_tes" id="" cols="30" rows="10" class="form-control border border-dark">{{ $data->deskripsi_tes }}</textarea>
                    </div>
                    @error('deskripsi_tes')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Biaya :</label>
                    <div class="col-12">
                        <input type="number" name="biaya" class="form-control border border-dark"
                            value="{{ $data->biaya }}">
                    </div>
                    @error('biaya')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Biaya Jasa Dokter :</label>
                    <div class="col-12">
                        <input type="number" name="jasa_dokter" class="form-control border border-dark"
                            value="{{ $data->jasa_dokter }}">
                    </div>
                    @error('jasa_dokter')
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
