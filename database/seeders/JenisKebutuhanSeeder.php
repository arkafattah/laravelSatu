<?php

namespace Database\Seeders;

use App\Models\JenisKebutuhan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKebutuhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKebutuhan::factory(5)->create();
    }
}
