<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;

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
    Route::get('/', [AuthenticatedSessionController::class, 'index']);
    Route::post('/create/workStart', [AuthenticatedSessionController::class, 'workStart']);
    Route::post('/store/workEnd', [AuthenticatedSessionController::class, 'workEnd']);
    Route::post('/create/breakStart', [AuthenticatedSessionController::class, 'breakStart']);
    Route::post('/store/breakEnd', [AuthenticatedSessionController::class, 'breakEnd']);
});


Route::get('/attendance', [AuthenticatedSessionController::class, 'attendance']);