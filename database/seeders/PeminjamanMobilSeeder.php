<?php

namespace Database\Seeders;

use App\Models\PeminjamanMobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanMobil::factory(1)->create();
    }
}
