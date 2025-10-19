<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gotongroyong extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'tanggal',
        'jumlah_kelompok_arisan',
        'jumlah_penduduk_orang_tua_asuh',
        'dana_sehat',
        'pembangunan_rumah',
        'pengolahan_tanah',
        'pembiayaan_pendidikan',
        'pemeliharaan_fasilitas_umum',
        'pemberian_modal_usaha',
        'pengerjaan_sawah_kebun',
        'penangkapan_ikan_usaha',
        'menjaga_ketertiban',
        'peristiwa_kematian',
        'menjaga_kebersihan_desa',
        'membangun_jalan_irigasi',
        'pemberantasan_sarang_nyamuk',
    ];


    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
