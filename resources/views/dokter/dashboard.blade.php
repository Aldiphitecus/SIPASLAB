@extends('components.dokter-layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa-solid fa-house"></i> SIPASLAB Dokter Portal</h5>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <p>Selamat datang <span class="fw-bold">{{ $user->nama_user }}</span>, ini adalah halaman utama untuk portal
                {{ $user->role }}.</p>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">{{ $jumlahPemeriksaan }} Data Pemeriksaan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/dokter/pemeriksaan/semuadata">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">{{ $jumlahDokter }} Data Dokter</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/dokter/dokter/semuadokter">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
