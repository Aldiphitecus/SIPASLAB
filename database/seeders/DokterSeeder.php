<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataDokter = [
            [
                'no_sip' => 'DOK001',
                'nama_dokter' => 'Dr. Budi Santoso',
                'spesialisasi' => 'Kardiologi',
                'no_telepon' => '081234567890',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'no_sip' => 'DOK002',
                'nama_dokter' => 'Dr. Andi Wijaya',
                'spesialisasi' => 'Pediatri',
                'no_telepon' => '081234567891',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'no_sip' => 'DOK003',
                'nama_dokter' => 'Dr. Siti Nuraini',
                'spesialisasi' => 'Ginekologi',
                'no_telepon' => '081234567892',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'no_sip' => 'DOK004',
                'nama_dokter' => 'Dr. Irwan Harahap',
                'spesialisasi' => 'Ortopedi',
                'no_telepon' => '081234567893',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'no_sip' => 'DOK005',
                'nama_dokter' => 'Dr. Nia Safitri',
                'spesialisasi' => 'Dermatologi',
                'no_telepon' => '081234567894',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'no_sip' => 'DOK006',
                'nama_dokter' => 'Dr. Fajar Pratama',
                'spesialisasi' => 'Neurologi',
                'no_telepon' => '081234567895',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'no_sip' => 'DOK007',
                'nama_dokter' => 'Dr. Dewi Kartika',
                'spesialisasi' => 'Oftalmologi',
                'no_telepon' => '081234567896',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'no_sip' => 'DOK008',
                'nama_dokter' => 'Dr. Aditya Mahendra',
                'spesialisasi' => 'Gastroenterologi',
                'no_telepon' => '081234567897',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'no_sip' => 'DOK009',
                'nama_dokter' => 'Dr. Rina Wulandari',
                'spesialisasi' => 'Endokrinologi',
                'no_telepon' => '081234567898',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'no_sip' => 'DOK010',
                'nama_dokter' => 'Dr. Hendri Yulianto',
                'spesialisasi' => 'Pulmonologi',
                'no_telepon' => '081234567899',
                'jenis_kelamin' => 'Laki-laki',
            ],
        ];

        DB::table('dokter')->insert($dataDokter);
    }
}
