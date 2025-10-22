<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjudian extends Model
{
    use HasFactory;

    // Nama tabel (opsional, karena Laravel otomatis plural)
    protected $table = 'perjudians';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'id_desa',
        'tanggal',
        'jumlah_penduduk_berjudi',
        'jenis_perjudian',
        'jumlah_kasus_penipuan_penggelapan',
        'jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang',
    ];

    // Relasi ke tabel desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
