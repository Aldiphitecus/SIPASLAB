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
                        <td colspan="6" class="text-center">Tidak ada data pemeriksaan atas nama Anda</td>
                    </tr>
                @else
                    @forelse ($data as $pemeriksaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemeriksaan->pasien->kode_pasien }}</td>
                            <td>{{ $pemeriksaan->pasien->nama_pasien }}</td>
                            <td>{{ $pemeriksaan->dokter->nama_dokter }}</td>
                            <td>
                                <span
                                    class="badge bg-{{ $pemeriksaan->status_pemeriksaan == 'Selesai' ? 'success' : 'warning' }}">
                                    {{ $pemeriksaan->status_pemeriksaan }}
                                </span>
                            </td>
                            <td>
                                @if ($pemeriksaan->hasilTes->isEmpty())
                                    <span class="badge bg-danger">Belum</span>
                                @else
                                    <span class="badge bg-success">Sudah</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('pemeriksaan.spesifik', $pemeriksaan->id_pemeriksaan) }}">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pemeriksaan atas nama Anda</td>
                        </tr>
                    @endforelse
                @endif
            </table>
        </div>
    </div>
@endsection
