@extends('components.dokter-layout')

@section('content')

    <!-- Table -->
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title"><i class="fas fa-table me-1"></i> {{ $page->title }}</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="text-end mb-2">
                <a class="btn btn-dark btn-sm" href="previewPdf">Unduh PDF</a>
            </div>
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>Status</th>
                        <th>Hasil Tes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pemeriksaan</td>
                    </tr>
                @else
                    @foreach ($data as $pemeriksaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemeriksaan->pasien->kode_pasien }}</td>
                            <td>{{ $pemeriksaan->pasien->nama_pasien }}</td>
                            <td>{{ $pemeriksaan->dokter->nama_dokter }}</td>
                            <td>
                                <p
                                    class="badge bg-{{ $pemeriksaan->status_pemeriksaan == 'Selesai' ? 'success' : 'warning' }}">
                                    {{ $pemeriksaan->status_pemeriksaan }}</p>
                            </td>
                            <td>
                                @if ($pemeriksaan->hasilTes->isEmpty())
                                    <p class="badge bg-danger">Belum</p>
                                @else
                                    <p class="badge bg-success">Sudah</p>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="detail/{{ $pemeriksaan->id_pemeriksaan }}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
