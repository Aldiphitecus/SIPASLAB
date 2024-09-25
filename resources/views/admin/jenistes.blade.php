@extends('components.admin-layout')

@section('content')
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                <a class="btn btn-primary btn-sm" href="/admin/jenistes/tambah">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
                <a class="btn btn-dark btn-sm" href="previewPdf">Unduh PDF</a>
            </div>
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Tes</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pasien</td>
                    </tr>
                @else
                    @foreach ($data as $jenistes)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jenistes->nama_tes }}</td>
                            <td>{{ Str::limit($jenistes->deskripsi_tes, 20, '...') }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="/admin/jenistes/detail/{{ $jenistes->id_tes }}">Detail</a>
                                <a class="btn btn-warning btn-sm"
                                    href="/admin/jenistes/edit/{{ $jenistes->id_tes }}">Ubah</a>
                                @if ($jenistes->pemeriksaan->count() > 0)
                                    <button type="button" class="btn btn-danger btn-sm disabled" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal" data-id="{{ $jenistes->id_tes }}">
                                        Hapus
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal" data-id="{{ $jenistes->id_tes }}">
                                        Hapus
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>

    <script>
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin/jenistes/hapus/${id}`;
        });
    </script>
@endsection
