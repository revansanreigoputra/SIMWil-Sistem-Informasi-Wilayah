<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsektorKerajinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'total_nilai_produksi_tahun_ini',
        'total_nilai_bahan_baku_digunakan',
        'total_nilai_bahan_penolong_digunakan',
        'total_biaya_antara_dihabiskan',
        'total_jenis_kerajinan_rumah_tangga',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
