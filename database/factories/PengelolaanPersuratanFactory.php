<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengelolaanPersuratan>
 */
class PengelolaanPersuratanFactory extends Factory
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
            'surat_id' => 1,
            'pegawai_id' => $this->faker->randomElement(['Yan Medya', 'Antony', 'Yuda', 'Nugroho']),
            'keterangan' => $this->faker->word,
            'lampiran' => 'file.pdf',
            'tanggal' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'diterima', 'selesai', 'ditolak']),
        ];
    }
}
