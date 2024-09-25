@extends('components.dokter-layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <p class="card-text"><strong>Nama Pengguna :</strong>
                {{ $user->nama_user }}
            </p>
            <p class="card-text"><strong>Username :</strong>
                {{ $user->username }}
            </p>
            <p class="card-text"><strong>Role :</strong>
                {{ $user->role }}
            </p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i>
                Kembali</a>
            <a href="akun/{{ $user->id_user }}/edit" class="btn btn-warning btn-sm">Ubah Data</a>
        </div>
    </div>
@endsection
