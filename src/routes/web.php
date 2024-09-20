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
    //ログインフォーム
    Route::get('/', [AuthController::class, 'index']);
    //日付一覧フォーム
    Route::get('/date', [AttendanceController::class, 'indexDate'])
        ->name('date');
    Route::post('/attendance/date', [AttendanceController::class, 'perDate'])
        ->name('per/date');
    //打刻機能
    Route::post('/attend', [AttendanceController::class, 'attend']);
    Route::post('/leave', [AttendanceController::class, 'leave']);
    Route::post('/break', [AttendanceController::class, 'break']);
    Route::post('/breakEnd', [AttendanceController::class, 'breakEnd']);
});
