<?php

namespace Database\Seeders;

use App\Models\PemeliharaanSarpras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemeliharaanSarprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PemeliharaanSarpras::factory(1)->create();
    }
}
