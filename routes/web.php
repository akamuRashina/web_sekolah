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

// tampilan dashboard (read)
Route::get('/profile-school', [ProfileSchoolController::class, 'show']);

// form edit / input
Route::get('/profile-school/edit', [ProfileSchoolController::class, 'index']);
Route::post('/profile-school', [ProfileSchoolController::class, 'store']);
Route::put('/profile-school/{id}', [ProfileSchoolController::class, 'update']);

Route::get('/teachers', [TeacherController::class, 'index']);        // list
Route::get('/teachers/create', [TeacherController::class, 'create']); // form tambah
Route::post('/teachers', [TeacherController::class, 'store']);        // simpan

Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']); // form edit
Route::put('/teachers/{id}', [TeacherController::class, 'update']);    // update

Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']); // delete
