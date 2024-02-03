<?php

namespace Database\Factories;

use App\Models\Mobil;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeminjamanMobil>
 */
class PeminjamanMobilFactory extends Factory
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
            'mobil_id' => 2, // Menggunakan factory mobil untuk mendapatkan mobil_id
            'kegiatan' => $this->faker->sentence,
            'jam_pinjam' => $this->faker->time('H:i'),
            'jam_kembali' => $this->faker->time('H:i'),
            'tanggal_pinjam' => $this->faker->date,
            'tanggal_kembali' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
