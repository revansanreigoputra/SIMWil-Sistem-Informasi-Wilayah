<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenurutSektorUsaha extends Model
{
    use HasFactory;

    protected $table = 'menurut_sektor_usahas';

    protected $fillable = [
        'id_kec',
        'id_desa',
        'tanggal',
        'id_komoditas_sektor',
        'kk',
        'anggota',
        'buruh',
        'anggota_buruh',
        'pendapatan',
    ];
}
