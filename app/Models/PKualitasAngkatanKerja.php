<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKualitasAngkatanKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kualitas_angkatan_kerja_id',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
        'desa_id',
    ];

    public function kualitasAngkatanKerja()
    {
        return $this->belongsTo(\App\Models\MasterDDK\KualitasAngkatanKerja::class);
    }
}
