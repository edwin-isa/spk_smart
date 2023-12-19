<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\RangeNilaiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::resource('alternatif', AlternatifController::class);
Route::resource('kriteria', KriteriaController::class);
Route::resource('subkriteria', SubKriteriaController::class);
Route::resource('penilaian', PenilaianController::class);
Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');

