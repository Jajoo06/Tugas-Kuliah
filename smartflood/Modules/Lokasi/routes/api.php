<?php

use Illuminate\Support\Facades\Route;
use Modules\Lokasi\Http\Controllers\LokasiController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('lokasis', LokasiController::class)->names('lokasi');
});
