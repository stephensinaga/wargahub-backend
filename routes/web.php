<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JenisPengaduanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('', 'loginview')->name('login.view');
    Route::post('login', 'loginWeb')->name('login.action');
    Route::post('logout', 'logoutWeb')->middleware('auth')->name('logout.web');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('petugas', PetugasController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('Dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('superadmin.dashboard');
        } elseif (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return abort(403); // Jika role tidak dikenal
    })->name('dashboard');

    // Dashboard Superadmin
    Route::get('/superadmin/dashboard', [SuperadminController::class, 'Dashboard'])->name('superadmin.dashboard');

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('Dashboard');


Route::resource('laporan', LaporanController::class);
Route::get('/laporan/proses', [LaporanController::class, 'proses'])->name('laporan.proses');
Route::get('/laporan/diterima', [LaporanController::class, 'diterima'])->name('laporan.diterima');
Route::get('/laporan/ditolak', [LaporanController::class, 'ditolak'])->name('laporan.ditolak');
Route::get('/laporan/masuk', [LaporanController::class, 'masuk'])->name('laporan.masuk');
Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');

Route::get('/laporan/create', [ReportController::class, 'create'])->name('laporan.create');
Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
Route::get('/laporan/{id}', [ReportController::class, 'show'])->name('laporan.show');
Route::get('/laporan/{id}/edit', [ReportController::class, 'edit'])->name('laporan.edit');
Route::patch('/laporan/{id}/status', [ReportController::class, 'updateStatus'])->name('laporan.updateStatus');

Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::resource('jenispengaduan', JenisPengaduanController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::get('/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
Route::post('/kecamatan', [KecamatanController::class, 'store'])->name('kecamatan.store');
Route::resource('kota', KotaController::class);
Route::resource('provinsi', ProvinsiController::class);
Route::resource('petugas', PetugasController::class);

Route::get('/superadmin/admin/create', [SuperadminController::class, 'createAdmin'])->name('superadmin.createAdmin');
Route::post('/superadmin/admin/store', [SuperadminController::class, 'storeAdmin'])->name('superadmin.storeAdmin');
Route::get('/superadmin/laporan', [SuperadminController::class, 'laporan'])->name('superadmin.laporan');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
