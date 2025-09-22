<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Irigasi extends Model
{
    protected $fillable = [
        'tanggal',
        'saluran_primer',
        'saluran_primer_rusak',
        'saluran_sekunder',
        'saluran_sekunder_rusak',
        'saluran_tersier',
        'saluran_tersier_rusak',
        'pintu_sadap',
        'pintu_sadap_rusak',
        'pintu_pembagi_air',
        'pintu_pembagi_air_rusak',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}