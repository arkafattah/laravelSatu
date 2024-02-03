<?php

namespace Database\Seeders;

use App\Models\PengelolaanAtk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengelolaanAtkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengelolaanAtk::factory(1)->create();
    }
}
