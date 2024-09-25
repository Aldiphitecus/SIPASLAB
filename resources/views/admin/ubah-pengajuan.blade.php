@extends('components.admin-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/pengajuan/update-status/' . $data->id_dokter) }}" method="POST"
                enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nomor Surat Izin Praktik (SIP)
                        :</label>
                    <div class="col-12">
                        <input type="text" name="no_sip" class="form-control border border-dark"
                            value="{{ $data->no_sip }}" disabled>
                    </div>
                    @error('no_sip')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nama Dokter :</label>
                    <div class="col-12">
                        <input type="text" name="nama_dokter" class="form-control border border-dark"
                            value="{{ $data->nama_dokter }}" disabled>
                    </div>
                    @error('nama_dokter')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Spesialisasi :</label>
                    <div class="col-12">
                        <input type="text" name="spesialisasi" class="form-control border border-dark"
                            value="{{ $data->spesialisasi }}" disabled>
                    </div>
                    @error('spesialisasi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form form-group row my-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Nomor Telepon :</label>
                    <div class="col-12">
                        <input type="tel" name="no_telepon" class="form-control border border-dark"
                            value="{{ $data->no_telepon }}" disabled>
                    </div>
                    @error('no_telepon')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form form-group row mb-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Jenis Kelamin :</label>
                    <div class="col-12">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradio1" value="Laki-laki"
                                autocomplete="off" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} disabled>
                            <label class="btn btn-outline-success" for="btnradio1">Laki-laki</label>
                            <input type="radio" class="btn-check" name="jenis_kelamin" id="btnradio2" value="Perempuan"
                                autocomplete="off" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} disabled>
                            <label class="btn btn-outline-success" for="btnradio2">Perempuan</label>
                        </div><br>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form form-group row mb-4">
                    <label class="col-11 control-label text-sm col-form-label fw-bold">Status</label>
                    <div class="col-12">
                        <select class="form-control" name="status_pengajuan" id="status_pengajuan">
                            <option value="">- Pilih Proses -</option>
                            @foreach ($dataStatus as $status)
                                <option value="{{ $status }}"
                                    {{ old('status_pengajuan', $data->status_pengajuan) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('status_pengajuan')
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
