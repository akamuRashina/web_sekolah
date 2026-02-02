<?php
use App\Http\Controllers\admin\performancecontroller;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\profile_schoolcontroller;
use App\Http\Controllers\admin\ProfileController;

Route::resource('performance',performancecontroller::class);
Route::resource('teachers',TeacherController::class);
Route::resource('profile-school', profile_schoolcontroller::class);


// Route::post('/teachers', [TeacherController::class, 'store']);
// Route::put('/teachers/{id}', [TeacherController::class, 'update']);


// PROFILE SEKOLAH
// Route::get('/profile-school', [profile_schoolcontroller::class, 'index']);
// Route::post('/profile-school', [profile_schoolcontroller::class, 'store']);
// Route::put('/profile-school/{id}', [profile_schoolcontroller::class, 'update']);

// TEACHER
// Route::get('/teachers', [TeacherController::class, 'index']);
// Route::post('/teachers', [TeacherController::class, 'store']);
// Route::put('/teachers/{id}', [TeacherController::class, 'update']);