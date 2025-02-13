<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LaporanTableSeeder::class,
            JenisPengaduanTableSeeder::class,
            KecamatanTableSeeder::class,
            KotaTableSeeder::class,
            ProvinsiTableSeeder::class,
            PetugaTableSeeder::class,
        ]);
    }
}
