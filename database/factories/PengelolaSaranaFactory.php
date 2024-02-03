<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengelolaSarana>
 */
class PengelolaSaranaFactory extends Factory
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
            'keterangan' => $this->faker->word,
            'unit' => 'file.pdf',
            'jumlah_unit' => $this->faker->numberBetween(1, 50),
            'tanggal' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
