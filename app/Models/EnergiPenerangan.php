<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnergiPenerangan extends Model
{
    protected $fillable = [
        'tanggal',
        'listrik_pln',
        'diesel_umum',
        'genset_pribadi',
        'lampu_minyak',
        'kayu_bakar',
        'batu_bara',
        'tanpa_penerangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
    
}