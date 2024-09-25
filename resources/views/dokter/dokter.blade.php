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
            <div class="text-end mb-2">
                <a class="btn btn-dark btn-sm" href="previewPdf">Unduh PDF</a>
            </div>
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>No. SIP</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($data as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->no_sip }}</td>
                            <td>{{ $dokter->nama_dokter }}</td>
                            <td>{{ $dokter->spesialisasi }}</td>
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
