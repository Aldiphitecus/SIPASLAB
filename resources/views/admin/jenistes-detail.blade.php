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

    {{-- table --}}
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <p class="card-text"><strong>Nama Tes :</strong>
                            {{ $data->nama_tes }}
                        </p>
                        <p class="card-text"><strong>Deskripsi Tes :</strong><br>
                            {{ $data->deskripsi_tes }}
                        </p>
                        <p class="card-text"><strong>Biaya :</strong>
                            Rp. {{ number_format($data->biaya, 2, ',', '.') }}
                        </p>
                        <p class="card-text"><strong>Jasa Dokter :</strong>
                            Rp. {{ number_format($data->jasa_dokter, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
                <div class="m-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <a href="/admin/jenistes/edit/{{ $data->id_tes }}" class="btn btn-warning btn-sm">Ubah Tes</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal" data-id="{{ $data->id_tes }}">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
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
