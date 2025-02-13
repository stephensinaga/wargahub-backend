<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

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
            'judul' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'photo_1' => 'required|image',
            'photo_2' => 'required|image',
            'photo_3' => 'required|image',
            'description' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required|string|max:255',
        ]);

        Laporan::create([
            'judul' => $request->judul,
            'category' => $request->category,
            'photo_1' => $request->file('photo_1')->store('laporan_photos'),
            'photo_2' => $request->file('photo_2')->store('laporan_photos'),
            'photo_3' => $request->file('photo_3')->store('laporan_photos'),
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat!');
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $laporan->update($request->all());
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus');
    }
}
