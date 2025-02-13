<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\ReportStatusNotification;

class ReportController extends Controller
{
    // Menampilkan form untuk membuat laporan baru
    public function create()
    {
        return view('laporan.create');
    }

    // Menyimpan laporan yang dikirim oleh user
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'address' => 'required|string',
        ]);

        // Simpan foto ke storage
        $photo1 = $request->file('photo_1')->store('reports', 'public');
        $photo2 = $request->file('photo_2')->store('reports', 'public');
        $photo3 = $request->file('photo_3')->store('reports', 'public');

        $report = Report::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'photo_1' => $photo1,
            'photo_2' => $photo2,
            'photo_3' => $photo3,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim.');
    }

    // Menampilkan semua laporan
    public function index()
    {
        $laporans = Report::latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    // Menampilkan detail laporan
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('laporan.show', compact('report'));
    }

    // Menampilkan form edit laporan
    public function edit($id)
    {
        $laporan = Report::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    // Admin mengubah status laporan
    public function updateStatus(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Anda tidak memiliki izin'], 403);
        }

        $request->validate([
            'status' => 'required|in:pending,in_progress,accepted,rejected',
        ]);

        $report = Report::findOrFail($id);
        $report->update(['status' => $request->status]);

        // Kirim notifikasi ke user
        $report->user->notify(new ReportStatusNotification($request->status, $report));

        return response()->json(['message' => 'Status laporan diperbarui', 'report' => $report]);
    }
}
