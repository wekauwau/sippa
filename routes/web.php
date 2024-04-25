<?php

use App\Http\Controllers\AbsentController;
use Illuminate\Support\Facades\Route;

// assets
Route::get('images/{name}')
    ->name('image');

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

    Route::get('finance', function () {
        return view('finance');
    })->name('finance');

    Route::get('health', function () {
        return view('health');
    })->name('health');

    Route::get('violation', function () {
        return view('violation');
    })->name('violation');
});
