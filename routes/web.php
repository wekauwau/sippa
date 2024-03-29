<?php

use App\Http\Controllers\AbsentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SickController;
use App\Http\Controllers\ViolationController;
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
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('madin', function () {
        return view('madin');
    })->name('madin');

    Route::get(
        'attendance',
        [AbsentController::class, 'index']
    )->name('attendance');

    Route::get(
        'finance',
        [PaymentController::class, 'index']
    )->name('finance');

    Route::get(
        'payment/{status}',
        [PaymentController::class, 'getPayments'],
    )->name('ajax.payment');

    Route::get(
        'health',
        [SickController::class, 'index']
    )->name('health');

    Route::get(
        'violation',
        [ViolationController::class, 'index']
    )->name('violation');
});
