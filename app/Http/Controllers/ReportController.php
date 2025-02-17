<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\ReportStatusNotification;

class ReportController extends Controller
{
    // ✅ Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|in:Lingkungan,Kriminal,Sosial,Lalu Lintas',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'required|string',
        ]);

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

        return response()->json(['message' => 'Laporan berhasil dikirim', 'report' => $report], 201);
    }

    // ✅ Update status laporan oleh admin
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

        // Simpan riwayat perubahan status
        ReportHistory::create([
            'report_id' => $report->id,
            'admin_id' => Auth::id(),
            'status' => $request->status,
        ]);

        // Kirim notifikasi ke user
        $report->user->notify(new ReportStatusNotification($request->status, $report));

        return response()->json(['message' => 'Status laporan diperbarui', 'report' => $report]);
    }

    // ✅ Ambil semua laporan dengan pagination
    public function index()
    {
        $reports = Report::with('user')->latest()->paginate(10);
        return response()->json($reports);
    }

    // ✅ Detail laporan berdasarkan ID
    public function show($id)
    {
        $report = Report::with(['user', 'histories'])->findOrFail($id);
        return response()->json($report);
    }

    // ✅ Histori perubahan status laporan
    public function history($reportId)
    {
        $histories = ReportHistory::where('report_id', $reportId)->orderBy('created_at', 'desc')->get();
        return response()->json($histories);
    }

    // ✅ Hapus laporan (termasuk foto dan histori)
    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        // Hapus foto dari storage
        Storage::disk('public')->delete([$report->photo_1, $report->photo_2, $report->photo_3]);

        // Hapus histori laporan
        $report->histories()->delete();

        // Hapus laporan
        $report->delete();

        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }
}

