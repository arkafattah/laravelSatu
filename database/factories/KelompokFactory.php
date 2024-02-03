<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelompok>
 */
class KelompokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement(['keuangan', 'Kelembagaan dan Kemitraan', 'SPMI dan SPME', 'Sumber Daya Pendidik', 'Dosa Pendidik dan Integritas Akademik', 'Sistem Informasi dan PDDikti', 'Kerja Riset dan Pengabdian Masyarakat', 'Hukum, Kepegawaian dan Tata Laksana', 'Kehumasan', 'Perencanaan dan Keuangan']),
        ];
    }
}
