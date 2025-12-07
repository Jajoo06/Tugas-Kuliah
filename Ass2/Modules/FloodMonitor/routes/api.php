<?php

use Illuminate\Support\Facades\Route;
use Modules\FloodMonitor\Http\Controllers\FloodMonitorController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('floodmonitors', FloodMonitorController::class)->names('floodmonitor');
});
