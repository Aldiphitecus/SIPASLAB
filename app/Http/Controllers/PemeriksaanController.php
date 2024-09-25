<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use App\Models\HasilTesModel;
use App\Models\JenisTesModel;
use App\Models\PasienModel;
use App\Models\PemeriksaanModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $data = PemeriksaanModel::with('hasilTes')->orderBy('created_at', 'desc')->get();

        $breadcrumb = (object) [
            'title' => 'Data Pemeriksaan',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Semua Data Pemeriksaan'
        ];

        return view('admin.pemeriksaan', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function detail($id)
    {
        $data = PemeriksaanModel::with('hasilTes')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Pemeriksaan',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Detail Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Detail Data'
        ];

        return view('admin.detail', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Pemeriksaan',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Tambah Data Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Silahkan isi data'
        ];
        $dataPasien = PasienModel::orderBy('id_pasien', 'desc')->get();
        $dataDokter = DokterModel::where('status_pengajuan', 'Diterima')->get();
        $dataJenisTes = JenisTesModel::all();

        return view('admin.tambah', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataPasien' => $dataPasien,
            'dataDokter' => $dataDokter,
            'dataJenisTes' => $dataJenisTes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => ['required'],
            'id_dokter' => ['required'],
            'id_tes' => ['required'],
            'tgl_pemeriksaan' => ['required']
        ], [
            'id_pasien.required' => 'Mohon pilih pasien',
            'id_dokter.required' => 'Mohon pilih dokter',
            'id_tes.required' => 'Mohon pilih jenis tes',
            'tgl_pemeriksaan.required' => 'Mohon pilih tanggal',
        ]);

        PemeriksaanModel::create([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'id_tes' => $request->id_tes,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan
        ]);

        return redirect()->route('pemeriksaan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PemeriksaanModel::find($id);
        $dataPasien = PasienModel::all();
        $dataDokter = DokterModel::all();
        $dataJenisTes = JenisTesModel::all();

        $breadcrumb = (object) [
            'title' => 'Ubah Data Pemeriksaan',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Ubah Data Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Ubah data'
        ];

        $dataStatus = ['Diproses', 'Selesai'];

        return view('admin.edit', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataPasien' => $dataPasien,
            'dataDokter' => $dataDokter,
            'dataJenisTes' => $dataJenisTes,
            'dataStatus' => $dataStatus,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dokter' => ['required'],
            'id_tes' => ['required'],
            'tgl_pemeriksaan' => ['required']
        ], [
            'id_pasien.required' => 'Mohon pilih pasien',
            'id_dokter.required' => 'Mohon pilih dokter',
            'id_tes.required' => 'Mohon pilih jenis tes',
            'tgl_pemeriksaan.required' => 'Mohon pilih tanggal',
        ]);

        $data = PemeriksaanModel::find($id);

        $data['id_dokter'] = $request['id_dokter'];
        $data['id_tes'] = $request['id_tes'];
        $data['tgl_pemeriksaan'] = $request['tgl_pemeriksaan'];
        $data['status_pemeriksaan'] = $request['status_pemeriksaan'];

        $data->save();

        return redirect()->route('pemeriksaan.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $checkData = PemeriksaanModel::find($id);

        if (!$checkData) {
            return redirect()->route('pemeriksaan.index')->with('error', 'Data tidak ada di sistem');
        }

        // if ($checkData->pembayaran()->exists()) {
        //     $checkData->pembayaran()->delete();
        // }

        if ($checkData->hasilTes()->exists()) {
            $checkData->hasilTes()->delete();
        }

        $checkData->delete();

        return redirect()->route('pemeriksaan.index')->with('success', 'Data pemeriksaan dan data terkait sudah terhapus');
    }

    public function previewPdf()
    {
        $data = PemeriksaanModel::all();

        $breadcrumb = (object) [
            'title' => 'Unduh PDF',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Unduh PDF']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Pratinjau'
        ];

        return view('admin.previewpdf', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function unduhPdf()
    {
        $data = PemeriksaanModel::all();
        $tgl = Carbon::now()->format('d-m-Y');

        $pdf = Pdf::loadView('admin.unduhpdf', [
            'data' => $data,
            'tgl' => $tgl
        ]);

        return $pdf->download('Laporan-pemeriksaan-' . $tgl . '.pdf');
        // return view('admin.unduhpdf', [
        //     'data' => $data
        // ]);
    }

    public function formHasil($id)
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Hasil',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Tambah Hasil']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Tambahkan hasil'
        ];

        return view('admin.tambah-hasil', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'id' => $id
        ]);
    }

    public function tambahHasil(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemeriksaan' => 'required|exists:pemeriksaan,id_pemeriksaan',
            'hasil' => 'required|string',
        ], [
            'hasil.required' => 'Harap masukan hasil'
        ]);

        HasilTesModel::create([
            'id_pemeriksaan' => $validatedData['id_pemeriksaan'],
            'hasil' => $validatedData['hasil'],
        ]);

        return redirect()->route('admin.edit', ['id' => $validatedData['id_pemeriksaan']])->with('success', 'Hasil tes berhasil ditambahkan, silahkan ubah status menjadi "Selesai"');
    }

    public function formUbahHasilAdmin($id)
    {
        $dataHasil = HasilTesModel::where('id_pemeriksaan', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Ubah Hasil',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Ubah Hasil']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Ubah Hasil'
        ];

        return view('admin.ubah-hasil', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataHasil' => $dataHasil
        ]);
    }

    public function updateHasilAdmin(Request $request, $id)
    {
        $request->validate([
            'hasil' => ['required', 'string'],
        ], [
            'hasil.required' => 'Harap masukan hasil'
        ]);

        $data = HasilTesModel::where('id_pemeriksaan', $id)->first();
        $data['hasil'] = $request['hasil'];
        $data->save();

        return redirect()->route('pemeriksaan.index')->with('success', 'Hasil tes berhasil diubah');
    }


    // Controller pemeriksaan untuk dokter

    public function dokterIndex()
    {
        $data = PemeriksaanModel::with('hasilTes')->orderBy('created_at', 'desc')->get();

        $breadcrumb = (object) [
            'title' => 'Semua Pemeriksaan',
            'list' => ['Pemeriksaan', 'Semua Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Semua Data Pemeriksaan'
        ];

        return view('dokter.pemeriksaan', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
        ]);
    }
    public function dokterIndex2()
    {
        $dokterLogin = Auth::user()->nama_user;

        $data = PemeriksaanModel::whereHas('dokter', function ($query) use ($dokterLogin) {
            $query->where('nama_dokter', $dokterLogin);
        })->with('hasilTes')->orderBy('created_at', 'desc')->get();

        $breadcrumb = (object) [
            'title' => 'Pemeriksaan Anda',
            'list' => ['Pemeriksaan', 'Pemeriksaan Anda']
        ];
        $isActive = 'pemeriksaanAnda';
        $page = (object) [
            'title' => 'Semua Data Pemeriksaan Anda'
        ];

        return view('dokter.pemeriksaan-dokter', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data,
            'dokter' => $dokterLogin
        ]);
    }

    public function detailForDokter($id)
    {
        $data = PemeriksaanModel::with('hasilTes')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Pemeriksaan',
            'list' => ['Pemeriksaan', 'Semua Pemeriksaan', 'Detail Pemeriksaan']
        ];
        $isActive = 'pemeriksaan';
        $page = (object) [
            'title' => 'Detail Data'
        ];

        return view('dokter.detail', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function detailForDokter2($id)
    {
        $data = PemeriksaanModel::with('hasilTes')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Pemeriksaan',
            'list' => ['Pemeriksaan', 'Pemeriksaan Anda', 'Detail Pemeriksaan']
        ];
        $isActive = 'pemeriksaanAnda';
        $page = (object) [
            'title' => 'Detail Data'
        ];

        return view('dokter.detail-spesifik', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'data' => $data
        ]);
    }

    public function formHasil2($id)
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Hasil',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Tambah Hasil']
        ];
        $isActive = 'pemeriksaanAnda';
        $page = (object) [
            'title' => 'Tambahkan hasil'
        ];

        return view('dokter.tambah-hasil', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'id' => $id
        ]);
    }

    public function tambahHasil2(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemeriksaan' => 'required|exists:pemeriksaan,id_pemeriksaan',
            'hasil' => 'required|string',
        ], [
            'hasil.required' => 'Harap masukan hasil'
        ]);

        HasilTesModel::create([
            'id_pemeriksaan' => $validatedData['id_pemeriksaan'],
            'hasil' => $validatedData['hasil'],
        ]);

        return redirect()->route('edit.dokter', ['id' => $validatedData['id_pemeriksaan']])->with('success', 'Hasil tes berhasil ditambahkan, silahkan ubah status menjadi "Selesai"');
    }

    public function formUbahHasil($id)
    {
        $dataHasil = HasilTesModel::where('id_pemeriksaan', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Ubah Hasil',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Ubah Hasil']
        ];
        $isActive = 'pemeriksaanAnda';
        $page = (object) [
            'title' => 'Ubah Hasil'
        ];

        return view('dokter.ubah-hasil', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataHasil' => $dataHasil
        ]);
    }

    public function updateHasil(Request $request, $id)
    {
        $request->validate([
            'hasil' => ['required', 'string'],
        ], [
            'hasil.required' => 'Harap masukan hasil'
        ]);

        $data = HasilTesModel::where('id_pemeriksaan', $id)->first();
        $data['hasil'] = $request['hasil'];
        $data->save();

        return redirect()->route('spesifik.dokter')->with('success', 'Hasil tes berhasil diubah');
    }

    public function showDokter($id)
    {
        $data = PemeriksaanModel::find($id);
        $dataPasien = PasienModel::all();
        $dataDokter = DokterModel::all();
        $dataJenisTes = JenisTesModel::all();

        $breadcrumb = (object) [
            'title' => 'Ubah Data Pemeriksaan',
            'list' => ['Pemeriksaan', 'Data Pemeriksaan', 'Ubah Data Pemeriksaan']
        ];
        $isActive = 'pemeriksaanAnda';
        $page = (object) [
            'title' => 'Ubah data'
        ];

        $dataStatus = ['Diproses', 'Selesai'];

        return view('dokter.edit', [
            'breadcrumb' => $breadcrumb,
            'isActive' => $isActive,
            'page' => $page,
            'dataPasien' => $dataPasien,
            'dataDokter' => $dataDokter,
            'dataJenisTes' => $dataJenisTes,
            'dataStatus' => $dataStatus,
            'data' => $data
        ]);
    }

    public function updateDokter(Request $request, $id)
    {
        $request->validate([
            'id_dokter' => ['required'],
            'id_tes' => ['required'],
            'tgl_pemeriksaan' => ['required']
        ], [
            'id_pasien.required' => 'Mohon pilih pasien',
            'id_dokter.required' => 'Mohon pilih dokter',
            'id_tes.required' => 'Mohon pilih jenis tes',
            'tgl_pemeriksaan.required' => 'Mohon pilih tanggal',
        ]);

        $data = PemeriksaanModel::find($id);

        $data['id_dokter'] = $request['id_dokter'];
        $data['id_tes'] = $request['id_tes'];
        $data['tgl_pemeriksaan'] = $request['tgl_pemeriksaan'];
        $data['status_pemeriksaan'] = $request['status_pemeriksaan'];

        $data->save();

        return redirect()->route('spesifik.dokter')->with('success', 'Data berhasil diubah');
    }
}
