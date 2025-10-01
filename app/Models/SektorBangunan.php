<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorBangunan extends Model
{
    use HasFactory;

    // Laravel otomatis baca tabel jamak dari nama model.
    // Karena migration bikin `sektor_bangunans`, otomatis kebaca.
    // Tapi kalau mau eksplisit, bisa tambahin $table.
    protected $table = 'sektor_bangunans';

    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'tanggal',
        'jumlah_bangunan_tahun_ini',
        'biaya_pemeliharaan',
        'total_nilai_bangunan',
        'biaya_antara_lainnya',
    ];
}
