<?php

use Illuminate\Support\Facades\Route;
use Modules\Laporan\Http\Controllers\LaporanController;


Route::middleware(['auth'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan/get-data', [LaporanController::class, 'getData']);
    Route::post('/laporan', [LaporanController::class, 'store']);
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);
});

