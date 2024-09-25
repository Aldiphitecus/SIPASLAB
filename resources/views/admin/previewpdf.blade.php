@extends('components.admin-layout')

@section('content')
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">Pratinjau</h5>
        </div>
        <div class="card-body">
            <div class="text-end mb-2">
                <a class="btn btn-success btn-sm" href="unduh-pdf">Unduh PDF</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Tes</th>
                    <th>Waktu dan Tanggal Pemeriksaan</th>
                    <th>Status</th>
                </tr>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td> <!-- Note: colspan="6" -->
                    </tr>
                @else
                    @foreach ($data as $pemeriksaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemeriksaan->pasien->kode_pasien }}</td>
                            <td>{{ $pemeriksaan->pasien->nama_pasien }}</td>
                            <td>{{ $pemeriksaan->dokter->nama_dokter }}</td>
                            <td>{{ $pemeriksaan->jenisTes->nama_tes }}</td>
                            <td>{{ $pemeriksaan->waktu_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->status_pemeriksaan }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                Kembali</a>
        </div>
    </div>
@endsection
