<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPengaduanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_pengaduans')->insert([
            ['nama' => 'Fasilitas Umum', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lingkungan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Keamanan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
