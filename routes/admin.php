<?php
use App\Http\Controllers\newscontroller;

Route::resource('news', newscontroller::class);

use App\Http\Controllers\Admin\CategoryController;

Route::resource('categories', Categorycontroller::class);

use App\Http\Controllers\admin\performancecontroller;
Route::resource('performance',performancecontroller::class);
