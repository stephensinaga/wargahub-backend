<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class PetugasController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('status', '!=', 'pending')->get();
        return view('petugas.laporan.index', compact('laporans'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('petugas.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => $request->status]);

        return redirect()->route('petugas.laporan.index')->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('petugas.laporan.show', compact('laporan'));
    }
}
