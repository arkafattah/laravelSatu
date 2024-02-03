<?php

namespace Database\Seeders;

use App\Models\Sarana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sarana::factory(5)->create();
    }
}
