<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganPenduduk extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_penduduk';

    protected $fillable = [
        'tanggal',
        'jumlah_laki_laki_tahun_ini',
        'jumlah_perempuan_tahun_ini',
        'jumlah_laki_laki_tahun_lalu',
        'jumlah_perempuan_tahun_lalu',
        'jumlah_kepala_keluarga_laki_laki_tahun_ini',
        'jumlah_kepala_keluarga_perempuan_tahun_ini',
        'jumlah_kepala_keluarga_laki_laki_tahun_lalu',
        'jumlah_kepala_keluarga_perempuan_tahun_lalu',
    ];
}