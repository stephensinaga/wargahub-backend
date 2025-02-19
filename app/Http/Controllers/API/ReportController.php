<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $reports = Report::with('user')->latest()->get();
        return response()->json(['success' => true, 'data' => $reports]);
    }

    // Menampilkan laporan yang dibuat oleh user tertentu
    public function userReports(Request $request)
    {
        $userId = $request->user()->id;
        $reports = Report::where('user_id', $userId)->latest()->get();
        return response()->json(['success' => true, 'data' => $reports]);
    }

    // Menampilkan detail laporan berdasarkan ID
    public function show($id)
    {
        $report = Report::with('user')->find($id);
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Laporan tidak ditemukan'], 404);
        }
        return response()->json(['success' => true, 'data' => $report]);
    }

    // Membuat laporan baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_laporan' => 'required|array|min:1',
            'jenis_laporan.*' => 'string',
            'foto_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Simpan gambar
        $foto1Path = $request->file('foto_1')->store('reports', 'public');
        $foto2Path = $request->file('foto_2')->store('reports', 'public');
        $foto3Path = $request->file('foto_3')->store('reports', 'public');

        $report = Report::create([
            'user_id' => $request->user()->id,
            'jenis_laporan' => json_encode($request->jenis_laporan),
            'foto_1' => $foto1Path,
            'foto_2' => $foto2Path,
            'foto_3' => $foto3Path,
            'keterangan' => $request->keterangan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->alamat,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Laporan berhasil dikirim', 'data' => $report], 201);
    }

    // Mengupdate status laporan (Admin)
    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,diterima,ditolak,diproses',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $report = Report::find($id);
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Laporan tidak ditemukan'], 404);
        }

        $report->status = $request->status;
        $report->save();

        return response()->json(['success' => true, 'message' => 'Status laporan diperbarui', 'data' => $report]);
    }

    // Menghapus laporan (Admin atau pemilik laporan)
    public function destroy(Request $request, $id)
    {
        $report = Report::find($id);
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Laporan tidak ditemukan'], 404);
        }

        if ($report->user_id !== $request->user()->id && !$request->user()->is_admin) {
            return response()->json(['success' => false, 'message' => 'Tidak memiliki izin untuk menghapus laporan ini'], 403);
        }

        $report->delete();
        return response()->json(['success' => true, 'message' => 'Laporan berhasil dihapus']);
    }
}
