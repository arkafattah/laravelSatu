<?php

namespace Database\Seeders;

use App\Models\PengelolaSarana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengelolaSaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengelolaSarana::factory(1)->create();
    }
}
