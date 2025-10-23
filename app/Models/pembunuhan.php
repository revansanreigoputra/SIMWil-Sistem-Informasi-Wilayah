<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembunuhan extends Model
{
    use HasFactory;

    protected $table = 'pembunuhans';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'jumlah_kasus_tahun_ini',
        'jumlah_kasus_korban_penduduk',
        'jumlah_kasus_pelaku_penduduk',
        'jumlah_kasus_bunuh_diri',
        'jumlah_kasus_diproses_hukum',
    ];

    /**
     * Relasi ke tabel desa (jika ada model Desa).
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
