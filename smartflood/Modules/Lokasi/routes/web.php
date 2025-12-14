<?php

use Illuminate\Support\Facades\Route;
use Modules\Lokasi\Http\Controllers\LokasiSensorController;


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/lokasi', [LokasiSensorController::class,'index']);
    Route::get('/lokasi/get-data', [LokasiSensorController::class,'getData']);
    Route::post('/lokasi', [LokasiSensorController::class,'store']);
    Route::put('/lokasi/{id}', [LokasiSensorController::class,'update']);
    Route::delete('/lokasi/{id}', [LokasiSensorController::class,'destroy']);
});