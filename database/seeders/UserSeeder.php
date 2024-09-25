<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataUsers = [
            [
                'nama_user' => 'Aldi',
                'username' => 'admin1',
                'role' => 'Admin',
                'password' => Hash::make('12345'),
            ],
            [
                'nama_user' => 'Dr. Matt Solar',
                'username' => 'dokter1',
                'role' => 'Dokter',
                'password' => Hash::make('12345'),
            ],
        ];

        DB::table('users')->insert($dataUsers);
    }
}
