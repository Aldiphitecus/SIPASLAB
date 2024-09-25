@extends('components.dokter-layout')

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
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($data as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->no_sip }}</td>
                            <td>{{ $dokter->nama_dokter }}</td>
                            <td>{{ $dokter->spesialisasi }}</td>
                            <td>
                                @if ($dokter->status_pengajuan == 'Menunggu')
                                    <span class="badge bg-warning text-dark">{{ $dokter->status_pengajuan }}</span>
                                @else
                                    <span class="badge bg-success">{{ $dokter->status_pengajuan }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="detail/{{ $dokter->id_dokter }}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
