<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\ReportController;

// ✅ AUTH API
Route::post('/register', [AuthController::class, 'registerApi']);
Route::post('/login', [AuthController::class, 'loginApi']);

Route::get('/reports', [ReportController::class, 'index']); // Semua laporan
Route::get('/reports/user', [ReportController::class, 'userReports']); // Laporan user login
Route::get('/reports/{id}', [ReportController::class, 'show']); // Detail laporan
Route::post('/reports', [ReportController::class, 'store']); // Buat laporan baru
Route::put('/reports/{id}/status', [ReportController::class, 'updateStatus']); // Update status laporan
Route::delete('/reports/{id}', [ReportController::class, 'destroy']); // Hapus lapora


// ✅ Middleware untuk API yang membutuhkan autentikasi
Route::middleware('auth:sanctum')->group(function () {


    // 🔹 Logout
    Route::post('/logout', [AuthController::class, 'logoutApi']);
});
