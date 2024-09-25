@extends('components.admin-layout')

@section('content')
    {{-- modal --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apa anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="{{ $detailDokter->id_dokter }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        @if ($detailDokter->pemeriksaan->count() > 0)
                            <button class="btn btn-danger btn-sm disabled" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal" data-id="{{ $detailDokter->id_dokter }}">
                                Hapus
                            </button>
                        @else
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal" data-id="{{ $detailDokter->id_dokter }}">
                                Hapus
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
