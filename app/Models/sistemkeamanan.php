<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemKeamanan extends Model
{
    use HasFactory;

    protected $table = 'sistemkeamanans';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'organisasi_siskamling',
        'organisasi_pertahanan_sipil',
        'jumlah_rt_atau_pos_ronda',
        'jumlah_anggota_hansip_dan_linmas',
        'jadwal_kegiatan_siskamling',
        'buku_anggota_hansip_linmas',
        'jumlah_kelompok_satpam_swasta',
        'jumlah_pembinaan_siskamling',
        'jumlah_pos_jaga_induk_desa',
    ];

    /**
     * Relasi ke tabel desa.
     * Asumsi: ada model Desa dengan tabel 'desas'.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
