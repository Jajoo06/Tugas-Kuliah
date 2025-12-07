<?php

use Illuminate\Support\Facades\Route;
use Modules\FloodMonitor\Http\Controllers\LokasiSensorController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('floodmonitor', [LokasiSensorController::class, 'index'])->name('floodmonitor.index');
    Route::get('floodmonitor/data', [LokasiSensorController::class, 'getData'])->name('floodmonitor.data');
    Route::get('floodmonitor/create', [LokasiSensorController::class, 'create'])->name('floodmonitor.create');
    Route::post('floodmonitor', [LokasiSensorController::class, 'store'])->name('floodmonitor.store');
    Route::get('floodmonitor/{lokasi_sensor}/edit', [LokasiSensorController::class, 'edit'])->name('floodmonitor.edit');
    Route::patch('floodmonitor/{lokasi_sensor}', [LokasiSensorController::class, 'update'])->name('floodmonitor.update');
    Route::delete('floodmonitor/{lokasi_sensor}', [LokasiSensorController::class, 'destroy'])->name('floodmonitor.destroy');
});