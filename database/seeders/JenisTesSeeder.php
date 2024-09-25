<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJenisTes = [
            [
                'nama_tes' => 'Tes Darah Lengkap',
                'deskripsi_tes' => 'Pemeriksaan yang mengukur berbagai komponen dalam darah, seperti sel darah merah, sel darah putih, dan trombosit.',
                'biaya' => 150000,
                'jasa_dokter' => 50000,
            ],
            [
                'nama_tes' => 'Tes Urine',
                'deskripsi_tes' => 'Pemeriksaan sampel urine untuk mengetahui kondisi kesehatan, termasuk infeksi atau gangguan ginjal.',
                'biaya' => 100000,
                'jasa_dokter' => 40000,
            ],
            [
                'nama_tes' => 'Tes Kolesterol',
                'deskripsi_tes' => 'Pemeriksaan kadar kolesterol dalam darah untuk mengetahui risiko penyakit jantung dan stroke.',
                'biaya' => 120000,
                'jasa_dokter' => 45000,
            ],
            [
                'nama_tes' => 'Tes Gula Darah',
                'deskripsi_tes' => 'Pemeriksaan kadar glukosa dalam darah untuk mendeteksi diabetes atau kondisi pradiabetes.',
                'biaya' => 110000,
                'jasa_dokter' => 40000,
            ],
            [
                'nama_tes' => 'Tes Fungsi Ginjal',
                'deskripsi_tes' => 'Pemeriksaan untuk mengevaluasi kinerja ginjal dengan mengukur kadar kreatinin dan ureum dalam darah.',
                'biaya' => 160000,
                'jasa_dokter' => 55000,
            ],
            [
                'nama_tes' => 'Tes Fungsi Hati',
                'deskripsi_tes' => 'Pemeriksaan yang dilakukan untuk menilai fungsi hati dan mendeteksi kelainan seperti hepatitis atau sirosis.',
                'biaya' => 170000,
                'jasa_dokter' => 60000,
            ],
            [
                'nama_tes' => 'Tes Elektrokardiogram (EKG)',
                'deskripsi_tes' => 'Pemeriksaan aktivitas listrik jantung untuk mengetahui adanya gangguan irama jantung atau penyakit jantung koroner.',
                'biaya' => 180000,
                'jasa_dokter' => 60000,
            ],
            [
                'nama_tes' => 'Tes Kehamilan',
                'deskripsi_tes' => 'Pemeriksaan hormon hCG dalam urine atau darah untuk mendeteksi kehamilan.',
                'biaya' => 90000,
                'jasa_dokter' => 30000,
            ],
            [
                'nama_tes' => 'Tes HIV',
                'deskripsi_tes' => 'Pemeriksaan darah untuk mendeteksi adanya infeksi virus HIV.',
                'biaya' => 200000,
                'jasa_dokter' => 75000,
            ],
            [
                'nama_tes' => 'Tes Tiroid',
                'deskripsi_tes' => 'Pemeriksaan kadar hormon tiroid dalam darah untuk mengetahui fungsi kelenjar tiroid.',
                'biaya' => 190000,
                'jasa_dokter' => 70000,
            ],
        ];

        DB::table('jenis_tes')->insert($dataJenisTes);
    }
}
