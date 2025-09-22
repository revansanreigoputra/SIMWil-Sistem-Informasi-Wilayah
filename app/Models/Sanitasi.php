<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanitasi extends Model
{
    protected $fillable = [
        'tanggal',
        'sumur_resapan_air',
        'mck_umum',
        'jamban_keluarga',
        'saluran_drainase',
        'kondisi_saluran',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'sumur_resapan_air' => 'integer',
        'mck_umum' => 'integer',
        'jamban_keluarga' => 'integer',
        'saluran_drainase' => 'string',
        'kondisi_saluran' => 'string',
    ];

    public static function getSaluranDrainaseOptions()
    {
        return [
            'ada' => 'Ada',
            'tidak ada' => 'Tidak Ada',
        ];
    }

    public static function getKondisiSaluranOptions()
    {
        return [
            'rusak' => 'Rusak',
            'mampet' => 'Mampet',
            'kurang memadai' => 'Kurang Memadai',
            'baik' => 'Baik',
        ];
    }
}