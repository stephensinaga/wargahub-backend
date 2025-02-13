<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index()
    {
        $kotas = Kota::all();
        return view('index_kota', compact('kotas'));
    }

    public function create()
    {
        return view('create_kota');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Kota::create(['nama' => $request->nama]);
        return redirect()->route('kota.index')->with('success', 'Kota berhasil ditambahkan');
    }

    public function edit(Kota $kota)
    {
        return view('edit_kota', compact('kota'));
    }

    public function update(Request $request, Kota $kota)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $kota->update(['nama' => $request->nama]);
        return redirect()->route('kota.index')->with('success', 'Kota berhasil diperbarui');
    }

    public function destroy(Kota $kota)
    {
        $kota->delete();
        return redirect()->route('kota.index')->with('success', 'Kota berhasil dihapus');
    }
}
