<?php

namespace Modules\FloodMonitor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\FloodMonitor\Database\Factories\LokasiSensorFactory;

class LokasiSensor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'lokasi_sensors';

    protected $fillable = [
        'nama_lokasi',
        'kecamatan',
        'deskripsi',
    ];

    // protected static function newFactory(): LokasiSensorFactory
    // {
    //     // return LokasiSensorFactory::new();
    // }
}
