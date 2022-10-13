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
use App\Http\Controllers\LaporanKinerjaStaffController;
use App\Http\Controllers\LaporanKlienController;
use App\Http\Controllers\LaporanStaffController;
use App\Http\Controllers\UserController;

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

// Route data staff
Route::resource('/tools/staff/datastaff', StaffController::class)->middleware('admin');

// Route data user
Route::resource('/tools/user/datauser', UserController::class)->except('show')->middleware('admin');

// Route data klien
Route::resource('/klien/dataklien', KlienController::class)->middleware('admin');

// Route data aktivitas
Route::resource('/tools/aktivitas/dataaktivitas', AktivitasController::class)->middleware('admin');

// Route data assignment
Route::resource('/assignment/dataassignment', AssignmentController::class)->middleware('admin');
Route::get('/assignment/dataassignment/{id}/printpdf', [AssignmentController::class, 'printPdf'])->middleware('admin');

// Route Report
Route::group(
    [
        'middleware' => ['pimpinan'],
        'prefix'     => '/',
    ],
    function () {
        Route::get('/laporan/staff', [LaporanStaffController::class, 'index']);
        Route::get('/laporan/staff/printpdf', [LaporanStaffController::class, 'printPdf']);

        Route::get('/laporan/kinerjastaff', [LaporanKinerjaStaffController::class, 'index']);
        Route::get('/laporan/kinerjastaff/printpdf', [LaporanKinerjaStaffController::class, 'printPdf']);

        Route::get('/laporan/klien', [LaporanKlienController::class, 'index']);
        Route::get('/laporan/klien/printpdf', [LaporanKlienController::class, 'printPdf']);

        Route::get('/laporan/aktivitas', [LaporanAktivitasController::class, 'index']);
        Route::get('/laporan/aktivitas/printpdf', [LaporanAktivitasController::class, 'printPdf']);

        Route::get('/laporan/assignment', [LaporanAssignmentController::class, 'index']);
        Route::get('/laporan/assignment/printpdf', [LaporanAssignmentController::class, 'printPdf']);
    }
);
