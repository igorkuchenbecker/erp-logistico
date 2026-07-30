<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\RastreamentoController;
use App\Http\Controllers\UFController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ufs', UFController::class);

Route::prefix('rastreamento')->name('rastreamento.')->group(function () {
    Route::get('/', [RastreamentoController::class, 'index'])->name('index');
    Route::get('/{codigo}', [RastreamentoController::class, 'show'])->name('show');
});

Route::get('/destino/{destino}', [DestinoController::class, 'show'])->name('destino.show');
