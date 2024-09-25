<?php

namespace App\Http\Controllers;

use App\Models\PasienModel;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = PasienModel::all();

        $breadcrumb = (object) [
            'title' => 'Data Pasien',
            'list' => ['Pemeriksaan', 'Data Pasien']
        ];
        $isActive = 'pasien';
        $page = (object) [
            'title' => 'Semua Data Pasien'
        ];

        return view('admin.pasien', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = PasienModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Data Pasien',
            'list' => ['Pemeriksaan', 'Data Pasien', 'Detail Pasien']
        ];
        $isActive = 'pasien';
        $page = (object) [
            'title' => 'Detail Data'
        ];

        return view('admin.pasien-detail', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Pasien',
            'list' => ['Pemeriksaan', 'Data Pasien', 'Tambah Pasien']
        ];
        $isActive = 'pasien';
        $page = (object) [
            'title' => 'Masukkan Data'
        ];
        return view('admin.pasien-tambah', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pasien' => [
                'required',
                'min:4',
                'unique:pasien,kode_pasien',
                function ($attribute, $value, $fail) {
                    if (substr($value, 0, 3) !== 'PAS' && substr($value, 0, 3) !== 'pas') {
                        $fail('Kode pasien harus diawali dengan "PAS".');
                    }
                }
            ],
            'nama_pasien'  => ['required', 'max:40'],
            'alamat' => ['required'],
            'no_telepon' => ['required', 'max:20'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required']
        ], [
            'kode_pasien.required' => 'Harap masukan kode pasien',
            'kode_pasien.min' => 'Harap tambahkan angka',
            'kode_pasien.unique' => 'Kode pasien sudah ada',
            'nama_pasien.required' => 'Harap masukan nama pasien',
            'nama_pasien.max' => 'Maksimal 40 karakter',
            'alamat.required' => 'Harap masukan alamat',
            'no_telepon.required' => 'Harap masukan nomor telepon',
            'no_telepon.max' => 'Maksimal 20 karakter',
            'tgl_lahir.required' => 'Harap pilih tanggal lahir',
            'jenis_kelamin.required' => 'Harap pilih jenis kelamin'
        ]);

        PasienModel::create([
            'kode_pasien' => strtoupper($request->kode_pasien),
            'nama_pasien' => ucwords($request->nama_pasien),
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect('/admin/pemeriksaan/tambah')->with('success', 'Data berhasil ditambahkan, silahkan isi data pemeriksaan pada pasien yang sudah anda masukan');
    }

    public function show($id)
    {
        $dataPasien = PasienModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Ubah Data Pasien',
            'list' => ['Pemeriksaan', 'Data Pasien', 'Ubah Data Pasien']
        ];
        $isActive = 'pasien';
        $page = (object) [
            'title' => 'Ubah Data'
        ];
        return view('admin.pasien-ubah', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataPasien' => $dataPasien
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien'  => ['required', 'max:40'],
            'alamat' => ['required'],
            'no_telepon' => ['required', 'max:20'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required']
        ], [
            'kode_pasien.required' => 'Harap masukan kode pasien',
            'kode_pasien.min' => 'Harap tambahkan angka',
            'kode_pasien.unique' => 'Kode pasien sudah ada',
            'nama_pasien.required' => 'Harap masukan nama pasien',
            'nama_pasien.max' => 'Maksimal 40 karakter',
            'alamat.required' => 'Harap masukan alamat',
            'no_telepon.required' => 'Harap masukan nomor telepon',
            'no_telepon.max' => 'Maksimal 20 karakter',
            'tgl_lahir.required' => 'Harap pilih tanggal lahir',
            'jenis_kelamin.required' => 'Harap pilih jenis kelamin'
        ]);

        $data = PasienModel::find($id);

        $data['nama_pasien'] = ucwords($request['nama_pasien']);
        $data['alamat'] = $request['alamat'];
        $data['no_telepon'] = $request['no_telepon'];
        $data['tgl_lahir'] = $request['tgl_lahir'];
        $data['jenis_kelamin'] = $request['jenis_kelamin'];

        $data->save();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diubah');
    }

    public function destroy($id)
    {
        $pasien = PasienModel::find($id);

        if ($pasien) {
            foreach ($pasien->pemeriksaan as $pemeriksaan) {
                $pemeriksaan->hasilTes()->delete();
                $pemeriksaan->delete();
            }

            $pasien->delete();

            return redirect()->route('pasien.index')->with('success', 'Data pasien dan pemeriksaan terkait berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Data pasien tidak ditemukan.');
    }
}
