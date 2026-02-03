<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
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

    /* ===== GALERI ===== */
    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);

    Route::post('/gallery', [GalleryController::class, 'store']);

    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

/*-- routes teacher --*/
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/create', [TeacherController::class, 'create']);
Route::post('/teachers', [TeacherController::class, 'store']);

Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);

require __DIR__.'/admin.php';

/* ===== PROFILE SCHOOL ===== */
Route::get('/profile-school', [ProfileSchoolController::class, 'show']);
Route::get('/profile-school/edit', [ProfileSchoolController::class, 'index']);
Route::post('/profile-school', [ProfileSchoolController::class, 'store']);
Route::put('/profile-school/{id}', [ProfileSchoolController::class, 'update']);
