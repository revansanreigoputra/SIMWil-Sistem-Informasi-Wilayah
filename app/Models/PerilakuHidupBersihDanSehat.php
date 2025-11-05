<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerilakuHidupBersihDanSehat extends Model
{
    use HasFactory;

    protected $table = 'perilaku_hidup_bersih_dan_sehat';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'keluarga_wc_sehat',
        'keluarga_wc_tidak_standar',
        'keluarga_buang_air_sungai',
        'keluarga_mck_umum',
        'makan_1x',
        'makan_2x',
        'makan_3x',
        'makan_lebih_3x',
        'belum_tentu_makan',
        'dukun_terlatih',
        'tenaga_kesehatan',
        'obat_tradisional_dukun',
        'paranormal',
        'obat_keluarga_sendiri',
        'tidak_diobati',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
