<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis' => $this->faker->word,
            'nopol' => $this->faker->word,
            'tipe' => $this->faker->word,
            'warna' => $this->faker->word,
            'tahun' => $this->faker->year,
        ];
    }
}
