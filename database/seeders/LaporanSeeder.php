<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        Laporan::create([
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
