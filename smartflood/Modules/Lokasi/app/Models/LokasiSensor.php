<?php

namespace Modules\SmartFlood\Models;

namespace Modules\Lokasi\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiSensor extends Model
{
    protected $fillable = [
        'nama_lokasi',
        'kecamatan',
        'deskripsi'
    ];
}
