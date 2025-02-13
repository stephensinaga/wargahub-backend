<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('provinsis')->insert([
            ['nama' => 'DKI Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jawa Barat', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Banten', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
