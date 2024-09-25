@extends('components.dokter-layout')
@section('content')
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
                        <p class="card-text"><strong>Kode Pasien :</strong>
                            {{ $data->pasien->kode_pasien }}
                        </p>
                        <p class="card-text"><strong>Nama Pasien :</strong>
                            {{ $data->pasien->nama_pasien }}
                        </p>
                        <p class="card-text"><strong>Alamat :</strong>
                            {{ $data->pasien->alamat }}
                        </p>
                        <p class="card-text"><strong>No. Telepon :</strong>
                            {{ $data->pasien->no_telepon }}
                        </p>
                        <p class="card-text"><strong>Tanggal Lahir :</strong>
                            {{ $data->pasien->tgl_lahir }}
                        </p>
                        <p class="card-text"><strong>Jenis Kelamin :</strong>
                            {{ $data->pasien->jenis_kelamin }}
                        </p>
                        <p class="card-text"><strong>Dokter Yang Menangani :</strong>
                            {{ $data->dokter->nama_dokter }}
                        </p>
                        <p class="card-text"><strong>Jenis Tes :</strong>
                            {{ $data->jenisTes->nama_tes }}
                        </p>
                        <p class="card-text"><strong>Tanggal dan Waktu Pemeriksaan :</strong>
                            {{ $data->tgl_pemeriksaan }} / {{ $data->updated_at->diffForHumans() }}
                        </p>
                        <p class="card-text"><strong>Status Pemeriksaan :</strong>
                            <span class="badge bg-{{ $data->status_pemeriksaan == 'Selesai' ? 'success' : 'warning' }}">
                                {{ $data->status_pemeriksaan }}
                            </span>
                        </p>
                        <p class="card-text"><strong>Hasil Pemeriksaan :</strong><br>
                            @if ($data->hasilTes->isEmpty())
                                Belum ada hasil
                            @else
                                @foreach ($data->hasilTes as $hasil)
                                    {{ $hasil->hasil }}<br>
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
                <div class="m-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <a href="/dokter/pemeriksaan/edit/{{ $data->id_pemeriksaan }}" class="btn btn-warning btn-sm">
                        Ubah Pemeriksaan</a>
                    @if ($data->hasilTes->isEmpty())
                        <a class="btn btn-primary btn-sm"
                            href="/dokter/pemeriksaan/tambah-hasil/{{ $data->id_pemeriksaan }}">Tambahkan
                            Hasil</a>
                    @else
                        <a class="btn btn-warning btn-sm"
                            href="/dokter/pemeriksaan/ubah-hasil/{{ $data->id_pemeriksaan }}">Ubah Hasil</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
