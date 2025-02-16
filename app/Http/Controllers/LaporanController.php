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
        $request->validate([
            'judul' => 'required|string',
            'category' => 'required|string',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string', // Pastikan ini ada
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Laporan::create([
            'judul' => $request->judul,
            'category' => $request->category,
            'photo_1' => $request->file('photo_1')->store('laporan'),
            'photo_2' => $request->file('photo_2')->store('laporan'),
            'photo_3' => $request->file('photo_3')->store('laporan'),
            'description' => $request->description, // Pastikan ini ada
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil disimpan');
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
