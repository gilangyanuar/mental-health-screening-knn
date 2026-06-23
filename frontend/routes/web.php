<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\Auth\LoginController;

Route::view('/', 'welcome');

// ================= FORM RESPONDEN =================
Route::view('/assessment/form', 'assessment.form')->name('assessment.form');

// ================= SIMPAN PROFILE & TAMPIL ASSESSMENT =================
// FIX: method POST untuk terima data profile dari form
Route::post('/assessment', [SkripsiController::class, 'showAssessment'])
    ->name('assessment.index');

// ================= PREDICT =================
Route::post('/predict', [SkripsiController::class, 'predict']);

// ================= LOGIN =================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ================= ADMIN =================
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [SkripsiController::class, 'index']);
    Route::delete('/admin/delete/{id}', [SkripsiController::class, 'destroy']);
});
