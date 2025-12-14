<?php

namespace Modules\Laporan\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id',
        'lokasi_sensor_id',
        'ketinggian_air',
        'status_risiko',
        'deskripsi',
        'foto_bukti'
    ];
}
