<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanJobdeptController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.main');
});
Route::resource('jabatan', JabatanController::class);
Route::resource('department', DepartmentController::class);
Route::resource('pegawai',PegawaiController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('gaji', GajiController::class);
Route::resource('cuti', CutiController::class);
Route::resource('jobdept', KaryawanJobdeptController::class);
