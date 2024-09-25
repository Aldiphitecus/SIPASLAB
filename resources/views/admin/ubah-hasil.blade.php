@extends('components.dokter-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/pemeriksaan/update-hasil/' . $dataHasil->pemeriksaan->id_pemeriksaan) }}"
                method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Hasil :</label>
                    <div class="col-12">
                        <textarea name="hasil" id="" cols="30" rows="10" class="form-control border border-dark">{{ $dataHasil->hasil }}</textarea>
                    </div>
                    @error('hasil')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button class="btn btn-warning btn-sm">Ubah Hasil</button>
            </form>
        </div>
    </div>
@endsection
