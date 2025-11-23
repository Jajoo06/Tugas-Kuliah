<?php

namespace Modules\Pendaftaran\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pendaftaran\Database\Factories\DaftarPendaftaranFactory;

class DaftarPendaftaran extends Model
{
    use HasFactory;

    // PENTING: Mendefinisikan nama tabel secara manual 
    // (karena nama model 'DaftarPendaftaran' tidak sama dengan nama tabel 'daftars')
    protected $table = 'daftars';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama',
        'asal_sekolah',
        'prodi_tujuan',
    ];

    // protected static function newFactory(): DaftarPendaftaranFactory
    // {
    //     // return DaftarPendaftaranFactory::new();
    // }
}