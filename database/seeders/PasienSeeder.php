<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPasien = [
            [
                'kode_pasien' => 'PAS001',
                'nama_pasien' => 'Agus Susanto',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta',
                'no_telepon' => '081234567890',
                'tgl_lahir' => '1980-05-12',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'kode_pasien' => 'PAS002',
                'nama_pasien' => 'Siti Aminah',
                'alamat' => 'Jl. Sudirman No. 45, Bandung',
                'no_telepon' => '081234567891',
                'tgl_lahir' => '1985-03-18',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'kode_pasien' => 'PAS003',
                'nama_pasien' => 'Budi Setiawan',
                'alamat' => 'Jl. Gajah Mada No. 78, Yogyakarta',
                'no_telepon' => '081234567892',
                'tgl_lahir' => '1990-07-22',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'kode_pasien' => 'PAS004',
                'nama_pasien' => 'Nurul Hidayati',
                'alamat' => 'Jl. Diponegoro No. 56, Surabaya',
                'no_telepon' => '081234567893',
                'tgl_lahir' => '1992-11-05',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'kode_pasien' => 'PAS005',
                'nama_pasien' => 'Andi Pratama',
                'alamat' => 'Jl. Kartini No. 9, Semarang',
                'no_telepon' => '081234567894',
                'tgl_lahir' => '1978-02-17',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'kode_pasien' => 'PAS006',
                'nama_pasien' => 'Dewi Anggraini',
                'alamat' => 'Jl. Imam Bonjol No. 12, Denpasar',
                'no_telepon' => '081234567895',
                'tgl_lahir' => '1988-08-25',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'kode_pasien' => 'PAS007',
                'nama_pasien' => 'Ahmad Fauzi',
                'alamat' => 'Jl. Dipati Ukur No. 34, Bandung',
                'no_telepon' => '081234567896',
                'tgl_lahir' => '1995-01-13',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'kode_pasien' => 'PAS008',
                'nama_pasien' => 'Fitri Handayani',
                'alamat' => 'Jl. Ahmad Yani No. 21, Medan',
                'no_telepon' => '081234567897',
                'tgl_lahir' => '1993-09-10',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'kode_pasien' => 'PAS009',
                'nama_pasien' => 'Hendra Wijaya',
                'alamat' => 'Jl. Sultan Agung No. 89, Palembang',
                'no_telepon' => '081234567898',
                'tgl_lahir' => '1982-06-30',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'kode_pasien' => 'PAS010',
                'nama_pasien' => 'Lina Puspitasari',
                'alamat' => 'Jl. Pahlawan No. 33, Bogor',
                'no_telepon' => '081234567899',
                'tgl_lahir' => '1996-04-09',
                'jenis_kelamin' => 'Perempuan',
            ],
        ];

        DB::table('pasien')->insert($dataPasien);
    }
}
