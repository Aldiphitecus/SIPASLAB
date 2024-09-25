@extends('components.admin-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="tambahdata" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold">Pasien</label>
                    <div class="col-11">
                        <select class="form-control border border-dark" id="id_pasien" name="id_pasien">
                            <option value="">- Pilih Pasien -</option>
                            @foreach ($dataPasien as $pasien)
                                <option value="{{ $pasien->id_pasien }}">
                                    {{ $pasien->kode_pasien }} - {{ $pasien->nama_pasien }}</option>
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
                        <select class="form-control border border-dark" id="id_dokter" name="id_dokter">
                            <option value="">- Pilih Dokter -</option>
                            @foreach ($dataDokter as $dokter)
                                <option value="{{ $dokter->id_dokter }}">{{ $dokter->no_sip }} - {{ $dokter->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_dokter')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-1 control-label text-sm col-form-label fw-bold p-1">Jenis Tes</label>
                    <div class="col-11">
                        <select class="form-control border border-dark" id="id_tes" name="id_tes">
                            <option value="">- Pilih Tes -</option>
                            @foreach ($dataJenisTes as $tes)
                                <option value="{{ $tes->id_tes }}">{{ $tes->nama_tes }}</option>
                            @endforeach
                        </select>
                        @error('id_tes')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-3 control-label text-sm col-form-label fw-bold p-1">Tanggal Pemeriksaan</label>
                    <div class="col-9">
                        <input class="form-control border border-dark" type="date" name="tgl_pemeriksaan"><br>
                        @error('tgl_pemeriksaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button class="btn btn-primary btn-sm">Tambahkan</button>
            </form>
        </div>
    </div>
@endsection
