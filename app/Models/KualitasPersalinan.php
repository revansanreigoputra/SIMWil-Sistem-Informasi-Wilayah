<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasPersalinan extends Model
{
    use HasFactory;

    protected $table = 'kualitas_persalinans';

    protected $fillable = [
        'tanggal',
        'persalinan_rumah_sakit_umum',
        'persalinan_puskesmas',
        'persalinan_praktek_bidan',
        'total_persalinan',
        'persalinan_rumah_bersalin',
        'persalinan_polindes',
        'persalinan_balai_kesehatan_ibu_anak',
        'persalinan_praktek_dokter',
        'rumah_sendiri',
        'rumah_dukun',
        'ditolong_dokter',
        'ditolong_bidan',
        'ditolong_perawat',
        'ditolong_dukun_bersalin',
        'ditolong_keluarga',
    ];
}
