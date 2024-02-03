<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Uid\NilUlid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'jab_id' => 1, // Sesuaikan dengan jumlah jabatan yang Anda buat
            'kelompok_id' => null,
            'name' => 'admin',
            'kode_pegawai' => '111',
            'no_hp' => '089531941653',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'Laki-Laki',

        ]);
        User::create([
            'jab_id' => 2, // Sesuaikan dengan jumlah jabatan yang Anda buat
            'kelompok_id' => 1,
            'name' => 'Verifikator',
            'kode_pegawai' => '222',
            'no_hp' => '089531941653',
            'email' => 'verifikator@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'Laki-Laki',

        ]);
        User::create([
            'jab_id' => 3, // Sesuaikan dengan jumlah jabatan yang Anda buat
            'kelompok_id' => 1,
            'name' => 'Validator',
            'kode_pegawai' => '333',
            'no_hp' => '089531941653',
            'email' => 'validator@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'Laki-Laki',

        ]);
        User::create([
            'jab_id' => 4, // Sesuaikan dengan jumlah jabatan yang Anda buat
            'kelompok_id' => 1,
            'name' => 'user',
            'kode_pegawai' => '444',
            'no_hp' => '089531941653',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'Laki-Laki',

        ]);
    }
}
