<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\ProfileSchoolController;
use App\Http\Controllers\TeacherController;

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
