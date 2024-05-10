<?php

use App\Http\Controllers\AbsentController;
use App\Http\Middleware\CheckRole;
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

    Route::get('finance', function () {
        return view('finance');
    })->name('finance');

    Route::get('health', function () {
        return view('health');
    })->name('health');

    Route::get('violation', function () {
        return view('violation');
    })->name('violation');

    Route::get('secretary', function () {
        return view('secretary');
    })->middleware(CheckRole::class)
        ->name('secretary');
});
