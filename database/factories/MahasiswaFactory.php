<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelompok;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodi = Prodi::inRandomOrder()->first();
        $kelompok = Kelompok::inRandomOrder()->first();

        if (!$prodi || !$kelompok) {
            throw new \Exception('Prodi or Kelompok not found. Please seed Prodi and Kelompok tables first.');
        }

        return [
            'nama_mahasiswa' => $this->faker->name,
            'no_telp' => $this->faker->phoneNumber,
            'prodi_id' => $prodi->id,
            'kelompok_id' => $kelompok->id,
            'deskripsi_skill' => $this->faker->sentence,
            'photo_piagam' => $this->faker->imageUrl(),
        ];
    }
}
