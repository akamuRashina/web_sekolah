<?php
use App\Http\Controllers\admin\performancecontroller;
use App\Http\Controllers\admin\extracurricularcontroller;

Route::resource('performance',performancecontroller::class);
Route::resource('extracurricular',extracurricularcontroller::class);