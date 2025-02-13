<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('petugas')->insert([
            [
                'nama' => 'Admin Utama',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'level' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Operator A',
                'email' => 'operator@example.com',
                'password' => Hash::make('password123'),
                'level' => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
