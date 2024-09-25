@extends('components.dokter-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            <div class="container mt-5">
                <div class="row">
                    <div class="row">
                        <!-- Card Pengajuan Nama Dokter -->
                        <div class="col-md-6 mb-4">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Pengajuan Nama Dokter</h5>
                                    <p class="card-text">Ajukan nama dokter baru untuk ditambahkan ke dalam sistem.</p>
                                    <a href="/dokter/pengajuan/form-pengajuan" class="btn btn-light">Ajukan Nama Dokter</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Pengajuan Anda -->
                        <div class="col-md-6 mb-4">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Pengajuan Anda</h5>
                                    <p class="card-text">Lihat status pengajuan nama dokter yang telah Anda ajukan.</p>
                                    <a href="/dokter/pengajuan/lihat-pengajuan" class="btn btn-light">Lihat Pengajuan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
