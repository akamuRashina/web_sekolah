<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentWorkController;
use App\Http\Controllers\Admin\MajorController;

Route::prefix('admin')->group(function () {

    Route::resource('major', MajorController::class);
    Route::resource('studentwork', StudentWorkController::class);

});