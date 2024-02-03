<?php

namespace Database\Seeders;

use App\Models\PengelolaanPersuratan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengelolaanPersuratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengelolaanPersuratan::factory(1)->create();
    }
}
