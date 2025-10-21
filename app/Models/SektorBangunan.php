<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorBangunan extends Model
{
    use HasFactory;

    protected $table = 'sektor_bangunans';

    protected $fillable = [
        'desa_id', // 🔹 Tambahkan desa_id
        'tanggal',
        'jumlah_bangunan_tahun_ini',
        'biaya_pemeliharaan',
        'total_nilai_bangunan',
        'biaya_antara_lainnya',
    ];

    /**
     * Relasi ke desa
     */
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id');
    }
}
