<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminRequestController;

/* ===== PUBLIC (TANPA LOGIN) ===== */
Route::get('/', function () {
    return view('dashboard'); // dashboard publik
})->name('dashboard');

/* ===== ADMIN REQUEST (GUEST) ===== */
Route::get('/apply-admin', [AdminRequestController::class, 'create'])
    ->name('admin.apply');

Route::post('/apply-admin', [AdminRequestController::class, 'store']);

/* ===== ADMIN AUTH ===== */
Route::get('/admin/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/admin/register', [AuthController::class, 'registerForm'])
    ->name('register');

Route::post('/admin/register', [AuthController::class, 'register']);

/* ===== ADMIN AREA ===== */
Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/profile', [AuthController::class, 'editProfile'])
        ->name('profile.edit');

    Route::put('/profile', [AuthController::class, 'updateProfile'])
        ->name('profile.update');

    Route::delete('/profile', [AuthController::class, 'deleteAccount'])
        ->name('profile.delete');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
