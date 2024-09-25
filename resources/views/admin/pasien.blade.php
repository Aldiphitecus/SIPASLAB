@extends('components.admin-layout')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apa Anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



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
                <a class="btn btn-primary btn-sm" href="tambah">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
                <a class="btn btn-dark btn-sm" href="previewPdf">Unduh PDF</a>
            </div>
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pasien</td>
                    </tr>
                @else
                    @foreach ($data as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->kode_pasien }}</td>
                            <td>{{ $pasien->nama_pasien }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="detail/{{ $pasien->id_pasien }}">Detail</a>
                                <a class="btn btn-warning btn-sm" href="{{ $pasien->id_pasien }}/edit">Ubah</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus" data-id="{{ $pasien->id_pasien }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('modalHapus');
            var deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var idPasien = button.getAttribute('data-id');
                deleteForm.action = 'hapus/' + idPasien;
            });
        });
    </script>
@endsection
