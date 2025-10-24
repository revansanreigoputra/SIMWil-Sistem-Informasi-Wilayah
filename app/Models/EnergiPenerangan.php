<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnergiPenerangan extends Model
{
    protected $table = 'energi_penerangans';
    protected $fillable = [
        'desa_id',
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

    /**
     * Relasi ke Desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}