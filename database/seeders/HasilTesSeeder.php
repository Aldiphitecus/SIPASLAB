<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_pemeriksaan' => 1,
                'hasil' => 'Hemoglobin (Hb): "14.0 g/dL"<br>
                Jumlah Sel Darah Merah (Eritrosit): "5.0 x10^6/µL"'
            ],
            [
                'id_pemeriksaan' => 1,
                'hasil' => 'Jumlah Sel Darah Merah (Eritrosit): "5.0 x10^6/µL"'
            ],
        ];

        DB::table('hasil_tes')->insert($data);
    }
}
