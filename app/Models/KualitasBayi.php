<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasBayi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jumlah_keguguran_kandungan',
        'jumlah_bayi_lahir',
        'jumlah_bayi_lahir_hidup',
        'jumlah_bayi_lahir_mati', // <-- TAMBAHAN KOLOM BARU
        'jumlah_bayi_mati_0_1_bulan',
        'jumlah_bayi_mati_1_12_bulan',
        'jumlah_bayi_lahir_berat_kurang_2_5_kg',
        'jumlah_bayi_0_5_tahun_hidup_disabilitas',
    ];
}