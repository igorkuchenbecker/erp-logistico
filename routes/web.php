<?php

use App\Http\Controllers\UFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ufs.index');
});

Route::resource('ufs', UFController::class);
