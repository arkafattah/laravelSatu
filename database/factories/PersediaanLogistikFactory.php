<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersediaanLogistik>
 */
class PersediaanLogistikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logistik_id' => 1, // Menggunakan factory logistik untuk mendapatkan logistik_id
            'user_id' => 1,
            'jumlah' => $this->faker->numberBetween(1, 50),
            'tanggal_pengambilan' =>  $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
