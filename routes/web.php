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

Route::resource('/login', AuthController::class);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::resource('/dashboard', DashboardController::class);
Route::resource('/staff/datastaff', StaffController::class);
Route::resource('/klien/dataklien', KlienController::class);
Route::resource('/aktivitas/dataaktivitas', AktivitasController::class);
Route::resource('/assignment/dataassignment', AssignmentController::class);
