<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsektorKehutanan extends Model
{
    use HasFactory;

    protected $table = 'subsektor_kehutanan';

    protected $fillable = [
        'tanggal',
        'total_nilai_produksi_tahun_ini',
        'total_nilai_bahan_baku_digunakan',
        'total_nilai_bahan_penolong_digunakan',
        'total_biaya_antara_dihabiskan',
    ];
}
