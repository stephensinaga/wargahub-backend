<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPengaduan;

class JenisPengaduanController extends Controller
{
    /**
     * Tampilkan daftar jenis pengaduan.
     */
    public function index()
    {
        $jenispengaduan = JenisPengaduan::all();
        return view('viewJenisPengaduan', compact('jenispengaduan'));
    }

    /**
     * Tampilkan form tambah jenis pengaduan.
     */
    public function create()
    {
        return view('createJenisPengaduan');
    }

    /**
     * Simpan jenis pengaduan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisPengaduan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenispengaduan.index')->with('success', 'Jenis Pengaduan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit jenis pengaduan.
     */
    public function edit($id)
    {
        $jenispengaduan = JenisPengaduan::findOrFail($id);
        return view('updateJenisPengaduan', compact('jenispengaduan'));
    }

    /**
     * Update jenis pengaduan di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenispengaduan = JenisPengaduan::findOrFail($id);
        $jenispengaduan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenispengaduan.index')->with('success', 'Jenis Pengaduan berhasil diperbarui!');
    }

    /**
     * Hapus jenis pengaduan dari database.
     */
    public function destroy($id)
    {
        $jenispengaduan = JenisPengaduan::findOrFail($id);
        $jenispengaduan->delete();

        return redirect()->route('jenispengaduan.index')->with('success', 'Jenis Pengaduan berhasil dihapus!');
    }
}
