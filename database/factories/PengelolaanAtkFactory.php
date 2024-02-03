<?php

namespace Database\Factories;

use App\Models\Atk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanMobil>
 */
class PengelolaanAtkFactory extends Factory
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
            'atk_id' => 2, // Menggunakan factory mobil untuk mendapatkan atk_id
            'keterangan' => $this->faker->sentence,
            'tanggal' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
