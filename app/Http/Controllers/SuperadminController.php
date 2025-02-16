<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    public function Dashboard()
    {
        $laporans = Laporan::all(); // Mengambil semua laporan
        return view('superadmin.dashboard', compact('laporans'));
    }
    // Menampilkan halaman tambah admin
    public function createAdmin()
    {
        return view('superadmin.create_admin');
    }

    // Menyimpan admin baru
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('superadmin.createAdmin')->with('success', 'Admin berhasil ditambahkan');
    }

    // Menampilkan laporan berdasarkan filter wilayah & jenis laporan
    public function laporan(Request $request)
    {
        // Ambil daftar wilayah unik dari laporan
        $wilayahs = Laporan::select('address as wilayah')->distinct()->pluck('wilayah');

        // Ambil daftar jenis laporan unik dari laporan
        $jenisLaporans = Laporan::select('category')->distinct()->pluck('category');

        // Ambil semua laporan, bisa difilter berdasarkan wilayah & jenis laporan
        $query = Laporan::query();

        if ($request->has('wilayah') && $request->wilayah != '') {
            $query->where('address', $request->wilayah);
        }

        if ($request->has('jenis') && $request->jenis != '') {
            $query->where('category', $request->jenis);
        }

        $laporans = $query->get();

        return view('superadmin.laporan', compact('laporans', 'wilayahs', 'jenisLaporans'));
    }
}
