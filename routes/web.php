<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login', function () {
    return response()
        ->view('login')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
})->name('login');


Route::get('/', function () {
    return view('login');
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/resume', function () {
    return view('resume');
})->middleware('auth')->name('resume');


Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');
