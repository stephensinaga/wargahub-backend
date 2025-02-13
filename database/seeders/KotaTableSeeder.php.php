<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kotas')->insert([
            ['nama' => 'Jakarta Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jakarta Barat', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jakarta Timur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
