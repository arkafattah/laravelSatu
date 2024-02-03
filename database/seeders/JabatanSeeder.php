<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create(['nama' => 'Admin']);
        Jabatan::create(['nama' => 'Verifikator']);
        Jabatan::create(['nama' => 'Validator']);
        Jabatan::create(['nama' => 'User']);
    }
}
