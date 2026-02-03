<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "hallo dek";
});

require __DIR__. '/admin.php';