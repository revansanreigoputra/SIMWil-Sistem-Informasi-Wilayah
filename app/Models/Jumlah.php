<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jumlah extends Model
{
    protected $fillable = [
        'tanggal',
        'jumlah_laki',
        'jumlah_perempuan',
        'jumlah_total',
        'jumlah_kk',
        'jumlah_penduduk',
    ];
}
