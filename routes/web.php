<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignmentController;


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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/dashboard', [DashboardController::class, 'filterDate']);
Route::resource('/staff/datastaff', StaffController::class)->middleware('auth');
Route::resource('/klien/dataklien', KlienController::class)->middleware('auth');
Route::resource('/aktivitas/dataaktivitas', AktivitasController::class)->middleware('auth');
Route::resource('/assignment/dataassignment', AssignmentController::class)->middleware('auth');
