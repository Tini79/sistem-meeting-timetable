<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\LaporanAktivitasController;
use App\Http\Controllers\LaporanAssignmentController;
use App\Http\Controllers\LaporanKlienController;
use App\Http\Controllers\LaporanStaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route login & logout
Route::get('/', [AuthController::class, 'index'])->name('/')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/dashboard', [DashboardController::class, 'filterDate']);

Route::resource('/staff/datastaff', StaffController::class)->middleware('auth');
Route::resource('/klien/dataklien', KlienController::class)->middleware('auth');
Route::resource('/aktivitas/dataaktivitas', AktivitasController::class)->middleware('auth');
Route::resource('/assignment/dataassignment', AssignmentController::class)->middleware('auth');

// Route Report
Route::get('/laporan/staff', [LaporanStaffController::class, 'index'])->middleware('auth');
Route::get('/laporan/staff/printpdf', [LaporanStaffController::class, 'printPdf'])->middleware('auth');

Route::get('/laporan/klien', [LaporanKlienController::class, 'index'])->middleware('auth');
Route::get('/laporan/klien/printpdf', [LaporanKlienController::class, 'printpdf'])->middleware('auth');

Route::get('/laporan/aktivitas', [LaporanAktivitasController::class, 'index'])->middleware('auth');
Route::get('/laporan/aktivitas/printpdf', [LaporanAktivitasController::class, 'printpdf'])->middleware('auth');

Route::get('/laporan/assignment', [LaporanAssignmentController::class, 'index'])->middleware('auth');
Route::get('/laporan/assignment/printpdf', [LaporanAssignmentController::class, 'printpdf'])->middleware('auth');