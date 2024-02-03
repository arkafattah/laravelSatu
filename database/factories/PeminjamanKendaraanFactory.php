<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanMobil>
 */
class PeminjamanKendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // Menggunakan factory user untuk mendapatkan user_id
            'kendaraan_id' => 2, // Menggunakan factory kendaraan untuk mendapatkan kendaraan_id
            'kegiatan' => $this->faker->sentence,
            'tanggal_pinjam' => $this->faker->date,
            'jam_pinjam' => $this->faker->time('H:i'),
            'tanggal_kembali' => $this->faker->date,
            'jam_kembali' => $this->faker->time('H:i'),
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
