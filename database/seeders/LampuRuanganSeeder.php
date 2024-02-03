<?php

namespace Database\Seeders;

use App\Models\LampuRuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LampuRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LampuRuangan::factory(1)->create();
    }
}
