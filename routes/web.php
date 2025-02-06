<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('Dashboard');
});
