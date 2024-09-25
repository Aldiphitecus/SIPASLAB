@extends('components.admin-layout')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title"><i class="fa-solid fa-house"></i> SIPASLAB Admin Portal</h5>
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
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">{{ $jumlahPemeriksaan }} Data Pemeriksaan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/pemeriksaan/semuadata">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">{{ $jumlahPasien }} Data Pasien</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/pasien/semuadata">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">{{ $jumlahDokter }} Data Dokter</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/dokter/semuadokter">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">{{ $jumlahTes }} Data Jenis Tes</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/jenistes/semuadata">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">
                            {{ $jumlahPengajuan }} Jumlah Pengajuan
                            <i class="fa-solid fa-bell {{ $jumlahPengajuan > 0 ? 'fa-shake' : '' }}"></i>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/pengajuan/semuapengajuan">Lihat
                                Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-chart-pie me-1"></i> Diagram Lingkaran Pemeriksaan</h5>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="180"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    <p>{{ $terakhirUpdate }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Diproses', 'Selesai'],
                datasets: [{
                    data: [{{ $diproses }}, {{ $selesai }}],
                    backgroundColor: ['#ffc107', '#198754'],
                    hoverBackgroundColor: ['#ffc107', '#198754']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
@endsection
