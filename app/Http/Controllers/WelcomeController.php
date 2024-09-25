<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use App\Models\JenisTesModel;
use App\Models\PasienModel;
use App\Models\PemeriksaanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pengambilan data jumlah
        $jumlahPasien = PasienModel::count();
        $jumlahPemeriksaan = PemeriksaanModel::count();
        $jumlahDokter = DokterModel::where('status_pengajuan', 'Diterima')->count();
        $jumlahPengajuan = DokterModel::where('status_pengajuan', 'Menunggu')->count();
        $jumlahJenisTes = JenisTesModel::count();

        // Pengambilan data status pemeriksaan
        $diproses = PemeriksaanModel::where('status_pemeriksaan', 'Diproses')->count();
        $selesai = PemeriksaanModel::where('status_pemeriksaan', 'Selesai')->count();

        // Pengambilan data untuk terakhir update
        $terakhirUpdateRecord = PemeriksaanModel::orderBy('created_at', 'desc')->first();

        if ($terakhirUpdateRecord) {
            $terakhirUpdate = 'Last update ' . $terakhirUpdateRecord->updated_at->diffForHumans();
        } else {
            $terakhirUpdate = 'No data';
        }


        $breadcrumb = (object) [
            'title' => 'Menu Utama',
            'list' => ['Beranda', 'Menu Utama']
        ];
        $isActive = 'dashboard';

        return view('admin.dashboard', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'user' => $user,
            'jumlahPasien' => $jumlahPasien,
            'jumlahPemeriksaan' => $jumlahPemeriksaan,
            'jumlahDokter' => $jumlahDokter,
            'jumlahTes' => $jumlahJenisTes,
            'diproses' => $diproses,
            'selesai' => $selesai,
            'terakhirUpdate' => $terakhirUpdate,
            'jumlahPengajuan' => $jumlahPengajuan
        ]);
    }
}
