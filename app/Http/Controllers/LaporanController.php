<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // Show the list of reports
    public function index()
    {
        $laporans = Laporan::all();
        return view('laporan.index', compact('laporans'));
    }

    // Show the create form (only for admin, superadmin)
    public function create()
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        return view('laporan.create');
    }

    // Store the report (only for admin, superadmin)
    public function store(Request $request)
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        $request->validate([
            'judul' => 'required|string',
            'category' => 'required|string',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Laporan::create([
            'judul' => $request->judul,
            'category' => $request->category,
            'photo_1' => $request->file('photo_1')->store('laporan'), // Store uploaded photo 1
            'photo_2' => $request->file('photo_2')->store('laporan'), // Store uploaded photo 2
            'photo_3' => $request->file('photo_3')->store('laporan'), // Store uploaded photo 3
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil disimpan');
    }

    // Show the report processing form (only for admin, superadmin)
    public function proses()
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        return view('laporan.proses');
    }

    // Show the accepted reports page (only for admin, superadmin)
    public function diterima()
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        return view('laporan.diterima');
    }

    // Show the rejected reports page (only for admin, superadmin)
    public function ditolak()
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        return view('laporan.ditolak');
    }

    // Show the incoming reports page (only for admin, superadmin)
    public function masuk()
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        return view('laporan.masuk');
    }

    // Show the details of a specific report
    public function show($id)
    {
        $laporan = Laporan::find($id);

        if (!$laporan) {
            return abort(404); // If not found, show 404 error
        }

        return view('laporan.show', compact('laporan'));
    }

    // Edit the report (only for admin, superadmin)
    public function edit($id)
    {
        if (Auth::user()->role === 'petugas') {
            return redirect()->route('laporan.index')->with('error', 'Akses ditolak');
        }

        $laporan = Laporan::findOrFail($id);
        return view('superadmin.laporan.edit', compact('laporan'));
    }

    public function dashboard()
    {
        $prosesCount = Laporan::where('status', 'proses')->count();
        $diterimaCount = Laporan::where('status', 'diterima')->count();
        $ditolakCount = Laporan::where('status', 'ditolak')->count();
        $masukCount = Laporan::where('status', 'masuk')->count();

        return view('dashboard', compact('prosesCount', 'diterimaCount', 'ditolakCount', 'masukCount'));
    }
}
