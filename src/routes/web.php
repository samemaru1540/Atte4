<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);

    Route::get('/attendance', [AttendanceController::class, 'attendance']);
    Route::post('/attendance', [AttendanceController::class, 'attendance'])->name('attendance.attendance');

    Route::post('/attend', [AttendanceController::class, 'attend']);
    Route::post('/leave', [AttendanceController::class, 'leave']);
    Route::post('/break', [AttendanceController::class, 'break']);
    Route::post('/breakEnd', [AttendanceController::class, 'breakEnd']);
});
