<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;

// ✅ AUTH API
Route::post('/register', [AuthController::class, 'registerApi']);
Route::post('/login', [AuthController::class, 'loginApi']);

// ✅ Middleware untuk API yang membutuhkan autentikasi
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'getUser']);


    // 🔹 Laporan
    Route::get('/reports', [ReportController::class, 'index']); // Semua laporan
    Route::get('/reports/{id}', [ReportController::class, 'show']); // Detail laporan
    Route::get('/reports/{id}/history', [ReportController::class, 'history']); // Histori status laporan
    Route::post('/reports', [ReportController::class, 'store']); // Kirim laporan
    Route::put('/reports/{id}/status', [ReportController::class, 'updateStatus']); // Update status laporan (admin)
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']); // Hapus laporan (admin)

    
    // 🔹 Logout
    Route::post('/logout', [AuthController::class, 'logoutApi']);
});
