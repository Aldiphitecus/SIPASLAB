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
                                <a class="btn btn-warning btn-sm" href="{{ $pemeriksaan->id_pemeriksaan }}/edit">Ubah</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal" data-id="{{ $pemeriksaan->id_pemeriksaan }}">
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
        const confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `hapus/${id}`;
        });
    </script>

@endsection
