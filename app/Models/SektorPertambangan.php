<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPertambangan extends Model
{
    use HasFactory;

    protected $table = 'sektor_pertambangan';

    protected $fillable = [
        'desa_id', // 🔹 Tambahan
        'tanggal',
        'total_nilai_produksi_tahun_ini',
        'total_nilai_bahan_baku_digunakan',
        'total_nilai_bahan_penolong_digunakan',
        'total_biaya_antara_dihabiskan',
        'jumlah_total_jenis_bahan_tambang_dan_galian',
    ];

    // Relasi ke desa
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id');
    }
}
