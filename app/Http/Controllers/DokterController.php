<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $data = DokterModel::where('status_pengajuan', 'Diterima')->get();

        $breadcrumb = (object) [
            'title' => 'Data Dokter',
            'list' => ['Dokter', 'Data Dokter']
        ];
        $page = (object) [
            'title' => 'Data semua dokter'
        ];
        $isActive = 'dokter';

        return view('admin.dokter', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function detailDokter($id)
    {
        $detailDokter = DokterModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Dokter',
            'list' => ['Dokter', 'Data Dokter', 'Detail Dokter']
        ];
        $page = (object) [
            'title' => 'Detail Dokter'
        ];
        $isActive = 'dokter';

        return view('admin.dokter-detail', ['breadcrumb' => $breadcrumb, 'page' => $page, 'isActive' => $isActive, 'detailDokter' => $detailDokter]);
    }

    public function create()
    {
        $data = DokterModel::all();

        $breadcrumb = (object) [
            'title' => 'Tambah Dokter',
            'list' => ['Dokter', 'Data Dokter', 'Tambah Dokter']
        ];
        $page = (object) [
            'title' => 'Silahkan isi data'
        ];
        $isActive = 'dokter';

        return view('admin.dokter-tambah', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_sip' => ['required', 'unique:dokter,no_sip'],
            'nama_dokter' => ['required', 'min:5', 'max:40'],
            'spesialisasi' => ['required', 'max:100'],
            'no_telepon' => ['required', 'max:20'],
            'jenis_kelamin' => ['required'],
        ], [
            'no_sip.required' => 'Harap masukan Nomor SIP',
            'no_sip.unique' => 'Nomor SIP sudah terdaftar di sistem',
            'nama_dokter.required' => 'Harap masukan nama',
            'nama_dokter.min' => 'Harap masukan nama Anda',
            'nama_dokter.max' => 'Masksimal 40 karakter',
            'spesialisasi.required' => 'Harap masukan spesialisasi dokter',
            'spesialisasi.max' => 'Masksimal 100 karakter',
            'no_telepon.required' => 'Harap masukan nomor telepon',
            'no_telepon.max' => 'Masksimal 20 karakter',
            'jenis_kelamin.required' => 'Harap pilih jenis kelamin',
        ]);

        DokterModel::create([
            'no_sip' => strtoupper($request->no_sip),
            'nama_dokter' => ucwords($request->nama_dokter),
            'spesialisasi' => ucwords($request->spesialisasi),
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('dokter.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = DokterModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Tambah Dokter',
            'list' => ['Dokter', 'Data Dokter', 'Edit Dokter']
        ];
        $page = (object) [
            'title' => 'Ubah data'
        ];
        $isActive = 'dokter';

        return view('admin.dokter-edit', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => ['required', 'min:6', 'max:40'],
            'spesialisasi' => ['required', 'max:100'],
            'no_telepon' => ['required', 'max:20'],
            'jenis_kelamin' => ['required'],
        ], [
            'nama_dokter.required' => 'Harap masukan nama',
            'nama_dokter.min' => 'Harap masukan nama Anda',
            'nama_dokter.max' => 'Masksimal 40 karakter',
            'spesialisasi.required' => 'Harap masukan spesialisasi dokter',
            'spesialisasi.max' => 'Masksimal 100 karakter',
            'no_telepon.required' => 'Harap masukan nomor telepon',
            'no_telepon.max' => 'Masksimal 20 karakter',
            'jenis_kelamin.required' => 'Harap pilih jenis kelamin',
        ]);

        $data = DokterModel::find($id);

        $data['nama_dokter'] = ucwords($request['nama_dokter']);
        $data['spesialisasi'] = ucwords($request['spesialisasi']);
        $data['no_telepon'] = $request->no_telepon;
        $data['jenis_kelamin'] = $request->jenis_kelamin;

        $data->save();

        return redirect()->route('dokter.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $dokter = DokterModel::find($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus');
    }

    public function pengajuanDokterAdmin()
    {
        $data = DokterModel::where('status_pengajuan', 'Menunggu')->get();

        $breadcrumb = (object) [
            'title' => 'Pengajuan Dokter',
            'list' => ['Dokter', 'Pengajuan Dokter']
        ];
        $page = (object) [
            'title' => 'Ubah data'
        ];
        $isActive = 'pengajuanDokter';

        return view('admin.pengajuandokter', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function detailPengajuanDokterAdmin($id)
    {
        $data = DokterModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Pengajuan Dokter',
            'list' => ['Dokter', 'Pengajuan Dokter', 'Detail Pengajuan Dokter']
        ];
        $page = (object) [
            'title' => 'Detail Pengajuan'
        ];
        $isActive = 'pengajuanDokter';

        return view('admin.pengajuandokter-detail', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'detailDokter' => $data,
        ]);
    }

    public function formUbahStatus($id)
    {
        $data = DokterModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Ubah Status Pengajuan',
            'list' => ['Dokter', 'Data Dokter', 'Ubah Status Pengajuan']
        ];
        $page = (object) [
            'title' => 'Ubah status pengajuan'
        ];
        $isActive = 'pengajuanDokter';

        $dataStatus = ['Menunggu', 'Diterima'];

        return view('admin.ubah-pengajuan', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
            'dataStatus' => $dataStatus
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pengajuan' => ['required'],
        ], [
            'status_pengajuan.required' => 'Harap pilih status pengajuan',
        ]);

        $data = [
            'status_pengajuan' => $request->status_pengajuan
        ];

        $data = DokterModel::find($id);

        $data['status_pengajuan'] = $request->status_pengajuan;

        $data->save();

        return redirect()->route('dokter.index')->with('success', 'Status berhasil diubah');
    }

    // Untuk logika role dokter
    // Untuk logika di dokter
    public function index2()
    {
        $data = DokterModel::all();

        $breadcrumb = (object) [
            'title' => 'Data Dokter',
            'list' => ['Dokter', 'Data Dokter']
        ];
        $page = (object) [
            'title' => 'Data semua dokter'
        ];
        $isActive = 'dokter';

        return view('dokter.dokter', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function detailDokter2($id)
    {
        $detailDokter = DokterModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Dokter',
            'list' => ['Dokter', 'Data Dokter', 'Detail Dokter']
        ];
        $page = (object) [
            'title' => 'Detail Dokter'
        ];
        $isActive = 'dokter';

        return view('dokter.dokter-detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'isActive' => $isActive,
            'detailDokter' => $detailDokter
        ]);
    }

    public function pengajuanDokter()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Dokter',
            'list' => ['Dokter', 'Pengajuan Dokter']
        ];
        $page = (object) [
            'title' => 'Menu Pengajuan Dokter'
        ];
        $isActive = 'pengajuan';

        return view('dokter.pengajuan-dokter', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'isActive' => $isActive
        ]);
    }

    public function formPengajuan()
    {
        $userLogin = Auth::user()->nama_user;
        $breadcrumb = (object) [
            'title' => 'Pengajuan Dokter',
            'list' => ['Dokter', 'Pengajuan Dokter', 'Form Pengajuan']
        ];
        $page = (object) [
            'title' => 'Form Pengajuan Dokter'
        ];
        $isActive = 'pengajuan';

        return view('dokter.form-pengajuan', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'isActive' => $isActive,
            'userLogin' => $userLogin
        ]);
    }

    public function prosesPengajuan(Request $request)
    {
        $request->validate([
            'no_sip' => ['required', 'unique:dokter,no_sip'],
            'nama_dokter' => ['required', 'min:5', 'max:40'],
            'spesialisasi' => ['required', 'max:100'],
            'no_telepon' => ['required', 'max:20'],
            'jenis_kelamin' => ['required'],
        ], [
            'no_sip.required' => 'Harap masukan Nomor SIP',
            'no_sip.unique' => 'Nomor SIP sudah terdaftar di sistem',
            'nama_dokter.required' => 'Harap masukan nama',
            'nama_dokter.min' => 'Harap masukan nama Anda',
            'nama_dokter.max' => 'Masksimal 40 karakter',
            'spesialisasi.required' => 'Harap masukan spesialisasi dokter',
            'spesialisasi.max' => 'Masksimal 100 karakter',
            'no_telepon.required' => 'Harap masukan nomor telepon',
            'no_telepon.max' => 'Masksimal 20 karakter',
            'jenis_kelamin.required' => 'Harap pilih jenis kelamin',
        ]);

        $data = [
            'no_sip' => strtoupper($request->no_sip),
            'nama_dokter' => ucwords($request->nama_dokter),
            'spesialisasi' => ucwords($request->spesialisasi),
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        DokterModel::create([
            'no_sip' => strtoupper($request->no_sip),
            'nama_dokter' => ucwords($request->nama_dokter),
            'spesialisasi' => ucwords($request->spesialisasi),
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('lihat.pengajuan')->with('success', 'Data pengajuan ditambahkan, pengajuan sedang diproses');
    }

    public function lihatPengajuan()
    {
        $userLogin = Auth::user()->nama_user;
        $data = DokterModel::where('nama_dokter', $userLogin)->get();

        $breadcrumb = (object) [
            'title' => 'Pengajuan Dokter',
            'list' => ['Dokter', 'Pengajuan Dokter', 'Lihat Pengajuan']
        ];
        $page = (object) [
            'title' => 'Lihat Pengajuan Dokter'
        ];
        $isActive = 'pengajuan';

        return view('dokter.lihat-pengajuan', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'isActive' => $isActive,
            'data' => $data
        ]);
    }
}
