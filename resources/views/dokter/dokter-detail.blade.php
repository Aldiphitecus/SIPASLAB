@extends('components.dokter-layout')

@section('content')
    {{-- table --}}
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('storage/img/guest.jpg') }}" alt="Foto Dokter"
                                    class="img-fluid rounded shadow-lg">
                            </div>
                            <div class="col">
                                <p class="card-text"><strong>Nomor Surat Izin Praktik (SIP) :</strong>
                                    {{ $detailDokter->no_sip }}
                                </p>
                                <p class="card-text"><strong>Nama Dokter :</strong>
                                    {{ $detailDokter->nama_dokter }}
                                </p>
                                <p class="card-text"><strong>Spesialisasi :</strong>
                                    {{ $detailDokter->spesialisasi }}
                                </p>
                                <p class="card-text"><strong>No. Telepon :</strong>
                                    {{ $detailDokter->no_telepon }}
                                </p>
                                <p class="card-text"><strong>Jenis Kelamin :</strong>
                                    {{ $detailDokter->jenis_kelamin }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
