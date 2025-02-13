<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::all();
        return view('index_provinsi', compact('provinsis'));
    }

    public function create()
    {
        return view('create_provinsi');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Provinsi::create(['nama' => $request->nama]);
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan');
    }

    public function edit(Provinsi $provinsi)
    {
        return view('edit_provinsi', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $provinsi->update(['nama' => $request->nama]);
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diperbarui');
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus');
    }
}
