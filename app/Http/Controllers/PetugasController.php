<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('index_petugas', compact('petugas'));
    }

    public function create()
    {
        return view('create_petugas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,operator',
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit(Petugas $petugas)
    {
        return view('edit_petugas', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $petugas->id,
            'level' => 'required|in:admin,operator',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
        ];

        if ($request->password) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
