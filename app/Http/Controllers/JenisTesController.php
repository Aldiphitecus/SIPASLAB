<?php

namespace App\Http\Controllers;

use App\Models\JenisTesModel;
use Illuminate\Http\Request;

class JenisTesController extends Controller
{
    public function index()
    {
        $data = JenisTesModel::all();

        $breadcrumb = (object) [
            'title' => 'Jenis Tes',
            'list' => ['Pemeriksaan', 'Jenis Tes']
        ];
        $page = (object) [
            'title' => 'Semua data Jenis Tes'
        ];
        $isActive = 'jenistes';

        return view('admin.jenistes', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function tambah()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Jenis Tes',
            'list' => ['Pemeriksaan', 'Jenis Tes', 'Tambah Jenis Tes']
        ];
        $isActive = 'jenistes';
        $page = (object) [
            'title' => 'Masukkan Data'
        ];
        return view('admin.jenistes-tambah', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tes' => ['required', 'max:100'],
            'deskripsi_tes' => ['required'],
            'biaya' => ['required', 'integer'],
            'jasa_dokter' => ['required', 'integer']
        ], [
            'nama_tes.required' => 'Harap masukanenis tes',
            'nama_tes.max' => 'Maksimal 50 karakter',
            'deskripsi_tes.required' => 'Harap masukan deskripsi tes',
            'biaya.required' => 'Harap masukan biaya',
            'biaya.integer' => 'Harap masukan angka',
            'jasa_dokter.required' => 'Harap masukan jasa dokter',
            'jasa_dokter.integer' => 'Harap masukan angka'
        ]);

        JenisTesModel::create([
            'nama_tes' => $request->nama_tes,
            'deskripsi_tes' => $request->deskripsi_tes,
            'biaya' => $request->biaya,
            'jasa_dokter' => $request->jasa_dokter
        ]);

        return redirect()->route('jenistes.index')->with('success', 'Jenis tes berhasil ditambahkan');
    }

    public function detail($id)
    {
        $data = JenisTesModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Jenis Tes',
            'list' => ['Pemeriksaan', 'Jenis Tes', 'Detail Jenis Tes']
        ];
        $isActive = 'jenistes';
        $page = (object) [
            'title' => 'Detail Data'
        ];

        return view('admin.jenistes-detail', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = JenisTesModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Ubah Jenis Tes',
            'list' => ['Pemeriksaan', 'Jenis Tes', 'Ubah Jenis Tes']
        ];
        $isActive = 'jenistes';
        $page = (object) [
            'title' => 'Ubah data'
        ];
        return view('admin.jenistes-edit', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tes' => ['required', 'max:100'],
            'deskripsi_tes' => ['required'],
            'biaya' => ['required', 'integer'],
            'jasa_dokter' => ['required', 'integer']
        ], [
            'nama_tes.required' => 'Harap masukan jenis tes',
            'nama_tes.max' => 'Maksimal 50 karakter',
            'deskripsi_tes.required' => 'Harap masukan deskripsi tes',
            'biaya.required' => 'Harap masukan biaya',
            'biaya.integer' => 'Harap masukan angka',
            'jasa_dokter.required' => 'Harap masukan jasa dokter',
            'jasa_dokter.integer' => 'Harap masukan angka'
        ]);

        $data = JenisTesModel::find($id);
        $data['nama_tes'] = $request['nama_tes'];
        $data['deskripsi_tes'] = $request['deskripsi_tes'];
        $data['biaya'] = $request['biaya'];
        $data['jasa_dokter'] = $request['jasa_dokter'];
        $data->update();

        return redirect()->route('jenistes.index')->with('success', 'Jenis tes berhasil diubah');
    }

    public function destroy($id)
    {
        $data = JenisTesModel::find($id);
        $data->delete();
        return redirect()->route('jenistes.index')->with('success', 'Jenis tes berhasil dihapus');
    }
}
