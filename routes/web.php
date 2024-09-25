<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AkunAdminController;
use App\Http\Controllers\AkunDokterController;
use App\Http\Controllers\DokterWelcomeController;
use App\Http\Controllers\HasilTesController;
use App\Http\Controllers\JenisTesController;
use App\Http\Controllers\PemeriksaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::get('/logout', [LoginController::class, 'logout']);

// Route::get('/home', function () {
//     return redirect('/admin');
// });


Route::middleware(['auth', 'userAkses:Admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [WelcomeController::class, 'index'])->name('admin.dashboard');
        Route::prefix('pemeriksaan')->group(function () {
            Route::get('/semuadata', [PemeriksaanController::class, 'index'])->name('pemeriksaan.index');
            Route::get('/tambah', [PemeriksaanController::class, 'create']);
            Route::post('/tambahdata', [PemeriksaanController::class, 'store']);
            Route::get('/previewPdf', [PemeriksaanController::class, 'previewPdf']);
            Route::get('/unduh-pdf', [PemeriksaanController::class, 'unduhPdf']);
            Route::get('/detail/{id}', [PemeriksaanController::class, 'detail'])->name('pemeriksaan.detail');
            Route::get('/detail/{id}/tambah-hasil', [PemeriksaanController::class, 'formHasil']);
            Route::post('/detail/tambah-hasil', [PemeriksaanController::class, 'tambahHasil'])->name('pemeriksaan.tambahHasil');
            Route::get('/ubah-hasil/{id}', [PemeriksaanController::class, 'formUbahHasilAdmin']);
            Route::put('/update-hasil/{id}', [PemeriksaanController::class, 'updateHasilAdmin']);
            Route::delete('/hapus/{id}', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');
            Route::delete('/detail/hapus/{id}', [PemeriksaanController::class, 'destroy']);
            Route::get('/{id}/edit', [PemeriksaanController::class, 'show'])->name('admin.edit');
            Route::get('detail/edit/{id}', [PemeriksaanController::class, 'show']);
            Route::put('/{id}', [PemeriksaanController::class, 'update']);
        });

        Route::prefix('pasien')->group(function () {
            Route::get('/semuadata', [PasienController::class, 'index'])->name('pasien.index');
            Route::get('/tambah', [PasienController::class, 'create']);
            Route::post('/tambahdata', [PasienController::class, 'store']);
            Route::get('/detail/{id}', [PasienController::class, 'detail']);
            Route::get('/{id}/edit', [PasienController::class, 'show']);
            Route::get('detail/{id}/edit', [PasienController::class, 'show']);
            Route::put('/{id}', [PasienController::class, 'update']);
            Route::delete('/hapus/{id}', [PasienController::class, 'destroy']);
            Route::delete('detail/hapus/{id}', [PasienController::class, 'destroy']);
            Route::get('previewPdf', [function () {
                abort(403, 'maaf bos, halaman belum ada');
            }]);
        });

        Route::prefix('jenistes')->group(function () {
            Route::get('/semuadata', [JenisTesController::class, 'index'])->name('jenistes.index');
            Route::get('/tambah', [JenisTesController::class, 'tambah']);
            Route::post('/tambahdata', [JenisTesController::class, 'store']);
            Route::get('/detail/{id}', [JenisTesController::class, 'detail']);
            Route::get('/edit/{id}', [JenisTesController::class, 'show']);
            Route::put('/update/{id}', [JenisTesController::class, 'update']);
            Route::delete('/hapus/{id}', [JenisTesController::class, 'destroy']);
        });

        Route::prefix('dokter')->group(function () {
            Route::get('/semuadokter', [DokterController::class, 'index'])->name('dokter.index');
            Route::get('detail/{id}', [DokterController::class, 'detailDokter']);
            Route::get('/tambah', [DokterController::class, 'create']);
            Route::post('/tambahdata', [DokterController::class, 'store']);
            Route::get('{id}/edit', [DokterController::class, 'show']);
            Route::get('detail/{id}/edit', [DokterController::class, 'show']);
            Route::put('/{id}', [DokterController::class, 'update']);
            Route::delete('/hapus/{id}', [DokterController::class, 'destroy']);
        });

        Route::prefix('poli')->group(function () {
            Route::get('/semuadata', function () {
                abort(403, 'maaf, halaman belum ada');
            })->name('poli.index');
        });

        Route::prefix('pengajuan')->group(function () {
            Route::get('/semuapengajuan', [DokterController::class, 'pengajuanDokterAdmin']);
            Route::get('/detail-pengajuan/{id}', [DokterController::class, 'detailPengajuanDokterAdmin']);
            Route::get('/ubah-status/{id}', [DokterController::class, 'formUbahStatus']);
            Route::put('/update-status/{id}', [DokterController::class, 'updateStatus']);
        });

        Route::prefix('akun')->group(function () {
            Route::get('/', [AkunAdminController::class, 'index'])->name('akun.index');
            Route::get('{id}/edit', [AkunAdminController::class, 'edit']);
            Route::put('/{id}', [AkunAdminController::class, 'update']);
        });
    });
});

Route::middleware(['auth', 'userAkses:Dokter'])->group(function () {
    Route::prefix('dokter')->group(function () {
        Route::get('/', [DokterWelcomeController::class, 'index']);
        Route::prefix('akun')->group(function () {
            Route::get('/', [AkunDokterController::class, 'index'])->name('akun.dokter');
            Route::get('{id}/edit', [AkunDokterController::class, 'edit']);
            Route::put('/{id}', [AkunDokterController::class, 'update']);
        });

        Route::prefix('pemeriksaan')->group(function () {
            Route::get('/semuadata', [PemeriksaanController::class, 'dokterIndex'])->name('pemeriksaan.dokter');
            Route::get('/semuadata2', [PemeriksaanController::class, 'dokterIndex2'])->name('spesifik.dokter');
            Route::get('/detail/{id}', [PemeriksaanController::class, 'detailForDokter'])->name('pemeriksaan.dokter');
            Route::get('/detail/{id}/spesifik', [PemeriksaanController::class, 'detailForDokter2'])->name('pemeriksaan.spesifik');
            Route::get('/tambah-hasil/{id}', [PemeriksaanController::class, 'formHasil2']);
            Route::post('/detail/tambah-hasil', [PemeriksaanController::class, 'tambahHasil2'])->name('dokter.tambahHasil');
            Route::get('/ubah-hasil/{id}', [PemeriksaanController::class, 'formUbahHasil']);
            Route::put('/update-hasil/{id_pemeriksaan}', [PemeriksaanController::class, 'updateHasil']);
            Route::get('/edit/{id}', [PemeriksaanController::class, 'showDokter'])->name('edit.dokter');
            Route::put('/update/{id}', [PemeriksaanController::class, 'updateDokter']);
        });

        Route::prefix('dokter')->group(function () {
            Route::get('/semuadokter', [DokterController::class, 'index2'])->name('dokter.dokter');
            Route::get('/detail/{id}', [DokterController::class, 'detailDokter2']);
        });

        Route::prefix('pengajuan')->group(function () {
            Route::get('/pengajuan-dokter', [DokterController::class, 'pengajuanDokter']);
            Route::get('/form-pengajuan', [DokterController::class, 'formPengajuan']);
            Route::get('/lihat-pengajuan', [DokterController::class, 'lihatPengajuan'])->name('lihat.pengajuan');
            Route::post('/proses-pengajuan', [DokterController::class, 'prosesPengajuan']);
        });
    });
});
