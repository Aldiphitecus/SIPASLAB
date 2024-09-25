@extends('components.admin-layout')

@section('content')
    {{-- Table --}}
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>No. SIP</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pengajuan</td>
                    </tr>
                @else
                    @foreach ($data as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->no_sip }}</td>
                            <td>{{ $dokter->nama_dokter }}</td>
                            <td>{{ $dokter->spesialisasi }}</td>
                            <td><span class="badge text-dark bg-warning">{{ $dokter->status_pengajuan }}</span>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="/admin/pengajuan/detail-pengajuan/{{ $dokter->id_dokter }}">Detail</a>
                                <a class="btn btn-warning btn-sm"
                                    href="/admin/pengajuan/ubah-status/{{ $dokter->id_dokter }}">Ubah</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
