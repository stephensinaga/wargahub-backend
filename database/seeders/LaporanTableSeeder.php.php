<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('laporans')->insert([
            [
                'judul' => 'Jalan Rusak',
                'description' => 'Jalan utama rusak parah akibat banjir.',
                'tanggal' => Carbon::now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lampu Jalan Mati',
                'description' => 'Beberapa lampu jalan di perumahan padam.',
                'tanggal' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
