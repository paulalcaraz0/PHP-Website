<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResumeController;

// LANDING PAGE - Shows sample resume
Route::get('/', function () {
    return view('resume');
})->name('home');

// ============================================
// AUTH ROUTES (Login, Google OAuth, Logout)
// ============================================

Route::get('/login', function () {
    return response()
        ->view('login')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Google OAuth
Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');

// Logout route
Route::post('/logout', function () {
    $userId = Auth::id(); // Save user ID before logout
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    
    // Redirect to their public resume instead of home
    return redirect()->route('resume.show', ['id' => $userId]);
})->name('logout');

// ============================================
// PUBLIC RESUME ROUTE (No login required)
// ============================================
// Format: http://127.0.0.1:8000/resume/3
Route::get('/resume/{id}', [ResumeController::class, 'show'])->name('resume.show');

// ============================================
// PROTECTED ROUTES (Login required)
// ============================================
Route::middleware('auth')->group(function () {
    // Edit resume page (dashboard)
    Route::get('/resume/{id}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    
    // Update resume
    Route::post('/resume/{id}/update', [ResumeController::class, 'update'])->name('resume.update');
    
    // Preview own resume before making public
    Route::get('/resume/{id}/preview', [ResumeController::class, 'preview'])->name('resume.preview');
});