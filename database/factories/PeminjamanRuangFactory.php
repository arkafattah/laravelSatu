<?php

namespace Database\Factories;

use App\Models\Ruang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanMobil>
 */
class PeminjamanRuangFactory extends Factory
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
            'ruang_id' => 2, // Menggunakan factory mobil untuk mendapatkan mobil_id
            'kegiatan' => $this->faker->sentence,
            'mulai' => $this->faker->time('H:i'),
            'selesai' => $this->faker->time('H:i'),
            'tanggal' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
