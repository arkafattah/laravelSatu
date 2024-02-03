<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Logistik;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JabatanSeeder::class,
            KelompokSeeder::class,
            UserSeeder::class,
            MobilSeeder::class,
            JenisBarangSeeder::class,
            LogistikSeeder::class,
            JenisKebutuhanSeeder::class,
            PeminjamanMobilSeeder::class,
            PersediaanLogistikSeeder::class,
            BarangSeeder::class,
            PemeliharaanSarprasSeeder::class,
            KendaraanSeeder::class,
            RuangSeeder::class,
            AtkSeeder::class,
            SaranaSeeder::class,
            SuratSeeder::class,
            PeminjamanKendaraanSeeder::class,
            PeminjamanRuangSeeder::class,
            LampuRuanganSeeder::class,
            PengelolaanPersuratanSeeder::class,
            PengelolaanAtkSeeder::class,
            KebersihanSeeder::class,
            PengelolaSaranaSeeder::class,
            PembelianSaranaSeeder::class,
        ]);
    }
}
