<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasaranaKebersihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'tps_lokasi',
        'tpa_lokasi',
        'alat_penghancur',
        'gerobak_sampah',
        'tong_sampah',
        'truk_pengangkut',
        'satgas_kebersihan',
        'anggota_satgas',
        'pemulung',
        'tempat_pengelolaan_sampah',
        'pengelolaan_sampah_rt',
        'pengelolaan_sampah_lainnya',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}