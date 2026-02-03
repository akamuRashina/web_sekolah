<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileSchoolController;

Route::get('/', function () {
    return view('welcome');
});

/* ===== AUTH ===== */
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/* ===== PROTECTED PAGE ===== */
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

/*--routes teacher--*/
Route::post('/teachers', [TeacherController::class, 'store']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);

require __DIR__.'/admin.php';

// PROFILE SEKOLAH
Route::get('/profile-school', [ProfileSchoolController::class, 'index']);
Route::post('/profile-school', [ProfileSchoolController::class, 'store']);
Route::put('/profile-school/{id}', [ProfileSchoolController::class, 'update']);

// TEACHER
Route::get('/teachers', [TeacherController::class, 'index']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
