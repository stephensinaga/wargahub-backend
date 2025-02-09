<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;


Route::post('/register', [AuthController::class, 'registerApi']);
Route::post('/login', [AuthController::class, 'loginApi']);

Route::get('/notifications', function () {
    return Auth::user()->notifications;
})->middleware('auth:sanctum');

// API yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    // Mendapatkan data user yang sedang login
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()], 200);
    });

    // Logout user
    Route::post('/logout', [AuthController::class, 'logoutApi']);

    // Laporan (Reports)
    Route::prefix('report')->group(function () {
        Route::post('/', [ReportController::class, 'store']); // Kirim laporan
        Route::get('/', [ReportController::class, 'index']); // Lihat semua laporan
        Route::put('/{id}/status', [ReportController::class, 'updateStatus']); // Admin update status laporan
    });
});
