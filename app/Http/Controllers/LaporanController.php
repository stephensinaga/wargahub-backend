<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string',
            'category' => 'required|string',
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simpan gambar jika ada
        $photo_1 = $request->file('photo_1') ? $request->file('photo_1')->store('uploads/laporan', 'public') : null;
        $photo_2 = $request->file('photo_2') ? $request->file('photo_2')->store('uploads/laporan', 'public') : null;
        $photo_3 = $request->file('photo_3') ? $request->file('photo_3')->store('uploads/laporan', 'public') : null;

        // Simpan data ke database
        Laporan::create([
            'judul' => $request->judul,
            'category' => $request->category,
            'photo_1' => $photo_1,
            'photo_2' => $photo_2,
            'photo_3' => $photo_3,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'tanggal' => $request->tanggal,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }
    public function proses()
    {
        return view('laporan.proses');
    }

    public function diterima()
    {
        return view('laporan.diterima');
    }

    public function ditolak()
    {
        return view('laporan.ditolak');
    }

    public function masuk()
    {
        return view('laporan.masuk');
    }
    public function show($id)
    {
        $laporan = Laporan::find($id);

        if (!$laporan) {
            return abort(404); // Jika tidak ditemukan, tampilkan 404
        }

        return view('laporan.show', compact('laporan'));
    }
}
