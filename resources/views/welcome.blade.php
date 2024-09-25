@extends('components.landing')

@section('content')
    <section class="hero d-flex align-items-center justify-content-center vh-100" id="beranda"
        style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('storage/img/rs-background.jpg') }}'); background-size: cover; background-position: center; color: white;">
        <div class="container text-center">
            <img src="{{ asset('storage/img/rsud-dr-haryoto-logo.png') }}" alt="RSUD Dr. Haryoto logo" width="180">
            <h1 class="display-4 fw-bold text-light">Selamat Datang di SIPASLAB</h1>
            <p class="lead">Sistem Informasi Pendataan Pasien Laboratorium RSUD Dr. Haryoto</p>
            <a href="#tentang" class="btn btn-light btn-lg">Tentang SIPASLAB</a>
        </div>
    </section>
    <section class="d-flex align-items-center justify-content-center vh-100" id="tentang" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tentang SIPASLAB</h2>
            <p class="lead text-center">SIPASLAB adalah sistem informasi yang dirancang khusus untuk memudahkan
                pendataan
                dan manajemen pasien laboratorium di RSUD Dr. Haryoto.</p>
            <div class="row">
                <div class="col-md-6">
                    <p>Sistem ini bertujuan untuk meningkatkan efisiensi proses registrasi, pengelolaan data, dan
                        pelaporan
                        pemeriksaan laboratorium. SIPASLAB memberikan akses mudah kepada dokter, admin, dan tenaga medis
                        untuk mengelola data pasien secara cepat dan akurat.</p>
                </div>
                <div class="col-md-6">
                    <p>Dengan fitur keamanan yang terintegrasi, data pasien tersimpan secara aman dan dapat diakses
                        sesuai
                        hak akses masing-masing pengguna. Kami berkomitmen untuk terus meningkatkan pelayanan dengan
                        memanfaatkan teknologi terbaru.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
