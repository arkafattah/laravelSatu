<?php

namespace Database\Seeders;

use App\Models\PeminjamanRuang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeminjamanRuang::factory(1)->create();
    }
}
