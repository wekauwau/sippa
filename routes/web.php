<?php

use App\Http\Middleware\RedirectIfAManager;
use Illuminate\Support\Facades\Route;

// assets
Route::get('images/{name}')
    ->name('image');

Route::get('', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('warta', function () {
    return view('blogs');
})->name('blogs');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('madin', function () {
        return view('madin');
    })->name('madin');

    Route::get('keuangan', function () {
        return view('finance');
    })->name('finance');

    Route::get('kesehatan', function () {
        return view('health');
    })->name('health');

    Route::get('pelanggaran', function () {
        return view('violation');
    })->name('violation');

    Route::get('data-santri', function () {
        return view('student-data');
    })->middleware(RedirectIfAManager::class)
        ->name('student-data');
});
