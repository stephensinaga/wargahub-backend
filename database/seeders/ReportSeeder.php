<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Models\User;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil pengguna dengan role 'petugas'
        $petugasUsers = User::where('role', 'petugas')->get();

        // Pastikan ada petugas sebelum seeding
        if ($petugasUsers->isEmpty()) {
            $this->command->info('Tidak ada pengguna dengan peran petugas. Seeder dibatalkan.');
            return;
        }

        foreach ($petugasUsers as $user) {
            Report::create([
                'user_id'    => $user->id,
                'category'   => 'Keamanan', // Contoh kategori laporan
                'photo_1'    => 'uploads/reports/photo1.jpg',
                'photo_2'    => 'uploads/reports/photo2.jpg',
                'photo_3'    => 'uploads/reports/photo3.jpg',
                'description' => 'Laporan keamanan mengenai aktivitas mencurigakan di sekitar area kantor.',
                'latitude'   => '-6.200000',
                'longitude'  => '106.816666',
                'address'    => 'Jl. Merdeka No. 10, Jakarta',
                'status'     => 'pending',
            ]);
        }
    }
}
