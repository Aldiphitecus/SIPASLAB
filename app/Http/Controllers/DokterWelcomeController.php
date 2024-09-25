<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;
use App\Models\PemeriksaanModel;
use Illuminate\Support\Facades\Auth;

class DokterWelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jumlahPemeriksaan = PemeriksaanModel::count();
        $jumlahDokter = DokterModel::where('status_pengajuan', 'Diterima')->count();

        $breadcrumb = (object) [
            'title' => 'Menu Utama',
            'list' => ['Beranda', 'Menu Utama']
        ];
        $isActive = 'dashboard';

        return view('dokter.dashboard', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'user' => $user,
            'jumlahPemeriksaan' => $jumlahPemeriksaan,
            'jumlahDokter' => $jumlahDokter
        ]);
    }
}
