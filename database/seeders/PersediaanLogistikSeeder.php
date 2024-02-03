<?php

namespace Database\Seeders;

use App\Models\PersediaanLogistik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersediaanLogistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersediaanLogistik::factory(1)->create();
    }
}
