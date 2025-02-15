<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanFactory extends Factory
{
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph
        ];
    }
}
