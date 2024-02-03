<?php

namespace Database\Seeders;

use App\Models\PembelianSarana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianSaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PembelianSarana::factory(1)->create();
    }
}
