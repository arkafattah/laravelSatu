<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembelianSarana>
 */
class PembelianSaranaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'sarana_id' => 1,
            'katalog' => 'file.pdf',
            'keterangan' => $this->faker->word,
            'tanggal' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
