<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemeliharaanSarpras>
 */
class PemeliharaanSarprasFactory extends Factory
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
            'barang_id' => 1,
            'jumlah' => 2,
            'keterangan' => $this->faker->word, 
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
     
        ];
    }
}
