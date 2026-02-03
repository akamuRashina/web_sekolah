<?php
use App\Http\Controllers\admin\performancecontroller;
use App\Http\Controllers\admin\partnercontroller;
Route::resource('performance',performancecontroller::class);
Route::resource('partner',partnercontroller::class);