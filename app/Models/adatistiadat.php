<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class adatistiadat extends Model
{
    protected $fillable = [
        'id_desa',
        'tanggal',
        'perkawinan',
        'kelahiran_anak',
        'upacara_kematian',
        'pengelolaan_hutan',
        'tanah_pertanian',
        'pengelolaan_laut',
        'memecahkan_konflik',
        'menjauhkan_bala',
        'memulihkan_hubungan_alam',
        'penanggulangan_kemiskinan',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
