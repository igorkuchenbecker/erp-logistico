<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UFController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ufs', UFController::class);
