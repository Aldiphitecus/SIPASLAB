@extends('components.dokter-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ url('dokter/pemeriksaan/update/' . $data->id_pemeriksaan) }}" method="POST"
                enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold">Pasien</label>
                    <div class="col-11">
                        <select class="form-control" id="id_pasien" name="id_pasien" disabled>
                            <option value="">- Pilih Pasien -</option>
                            @foreach ($dataPasien as $pasien)
                                <option value="{{ $pasien->id_pasien }}"
                                    {{ old('id_pasien') == $pasien->id_pasien || (isset($data) && $data->id_pasien == $pasien->id_pasien) ? 'selected' : '' }}>
                                    {{ $pasien->kode_pasien }} - {{ $pasien->nama_pasien }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_pasien')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold">Dokter</label>
                    <div class="col-11">
                        <select class="form-control" id="id_dokter" name="id_dokter" disabled>
                            <option value="">- Pilih Dokter -</option>
                            @foreach ($dataDokter as $dokter)
                                <option value="{{ $dokter->id_dokter }}"
                                    {{ old('id_dokter') == $dokter->id_dokter || (isset($data) && $data->id_dokter == $dokter->id_dokter) ? 'selected' : '' }}>
                                    {{ $dokter->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_dokter" value="{{ $data->id_dokter }}">
                        @error('id_dokter')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold p-1">Jenis Tes</label>
                    <div class="col-11">
                        <select class="form-control" id="id_tes" name="id_tes" disabled>
                            <option value="">- Pilih Tes -</option>
                            @foreach ($dataJenisTes as $tes)
                                <option value="{{ $tes->id_tes }}"
                                    {{ old('id_tes') == $tes->id_tes || (isset($data) && $data->id_tes == $tes->id_tes) ? 'selected' : '' }}>
                                    {{ $tes->nama_tes }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_tes" value="{{ $data->id_tes }}">
                        @error('id_tes')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold p-1">Tanggal</label>
                    <div class="col-11">
                        <input class="form-control" type="date" name="tgl_pemeriksaan"
                            value="{{ isset($data) ? $data->tgl_pemeriksaan : '' }}"><br>
                        @error('tgl_pemeriksaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold p-1">Status</label>
                    <div class="col-11">
                        <select class="form-control" name="status_pemeriksaan" id="status_pemeriksaan">
                            <option value="">- Pilih Proses -</option>
                            @foreach ($dataStatus as $status)
                                <option value="{{ $status }}"
                                    {{ old('status_pemeriksaan', $data->status_pemeriksaan) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button class="btn btn-warning btn-sm">Ubah Data</button>
            </form>
        </div>
    </div>
@endsection
