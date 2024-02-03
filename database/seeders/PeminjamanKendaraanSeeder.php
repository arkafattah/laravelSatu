<?php

namespace Database\Seeders;

use App\Models\PeminjamanKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanKendaraan::factory(1)->create();
    }
}
