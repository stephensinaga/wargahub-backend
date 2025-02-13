<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kecamatans')->insert([
            ['nama' => 'Cilandak', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kebayoran Baru', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tebet', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
