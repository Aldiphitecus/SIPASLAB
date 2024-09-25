@extends('components.admin-layout')

@section('content')
    {{-- modal --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apa anda yakin akan menghapus data ini?
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

    {{-- table --}}
    <div class="card card-outline">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><strong>Kode Pasien :</strong>
                            {{ $data->kode_pasien }}
                        </p>
                        <p class="card-text"><strong>Nama Pasien :</strong>
                            {{ $data->nama_pasien }}
                        </p>
                        <p class="card-text"><strong>Alamat :</strong>
                            {{ $data->alamat }}
                        </p>
                        <p class="card-text"><strong>No. Telepon :</strong>
                            {{ $data->no_telepon }}
                        </p>
                        <p class="card-text"><strong>Tanggal Lahir :</strong>
                            {{ $data->tgl_lahir }}
                        </p>
                        <p class="card-text"><strong>Jenis Kelamin :</strong>
                            {{ $data->jenis_kelamin }}
                        </p>
                    </div>
                </div>
                <div class="m-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <a href="{{ $data->id_pasien }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalHapus" data-id="{{ $data->id_pasien }}">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
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
