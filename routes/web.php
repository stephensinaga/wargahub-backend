<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JenisPengaduanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\PetugasController;





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


Route::resource('laporan', LaporanController::class);
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
