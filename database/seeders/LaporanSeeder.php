<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;
use Faker\Factory as Faker;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Menambahkan 50 laporan dengan data acak
        foreach (range(1, 50) as $index) {
            Laporan::create([
                'status' => $faker->randomElement(['proses', 'diterima', 'ditolak']),
                'judul' => $faker->sentence,
                'category' => $faker->word,
                'photo_1' => 'default1.jpg', // Ganti dengan nama file gambar yang ada
                'photo_2' => 'default2.jpg',
                'photo_3' => 'default3.jpg',
                'description' => $faker->text,
                'latitude' => $faker->latitude, // Koordinat acak
                'longitude' => $faker->longitude, // Koordinat acak
                'address' => $faker->address,
                'tanggal' => now(), // Tanggal sekarang
            ]);
        }

        // Menambahkan satu laporan statis
        Laporan::create([
            'status' => 'proses',
            'judul' => 'Laporan Test',
            'category' => 'Kategori Contoh',
            'photo_1' => 'default1.jpg', // Ganti dengan nama file gambar yang ada
            'photo_2' => 'default2.jpg',
            'photo_3' => 'default3.jpg',
            'description' => 'Ini adalah laporan percobaan.',
            'latitude' => -6.2088, // Contoh koordinat Jakarta
            'longitude' => 106.8456,
            'address' => 'Jl. Contoh No. 123, Jakarta',
            'tanggal' => now(), // Tanggal sekarang
        ]);
    }
}
