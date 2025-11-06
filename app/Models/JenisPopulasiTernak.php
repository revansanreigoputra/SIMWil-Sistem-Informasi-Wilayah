<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisTernak;
use App\Models\Desa;
use Illuminate\Database\Eloquent\Model;

class JenisPopulasiTernak extends Model
{
    protected $fillable = [
        'tanggal',
        'jenis_ternak_id',
        'jumlah_pemilik',
        'populasi',
        'dijual_langsung_ke_konsumen',
        'dijual_ke_pasar_hewan',
        'dijual_melalui_kud',
        'dijual_melalui_tengkulak',
        'dijual_melalui_pengecer',
        'dijual_ke_lumbung_desa_kelurahan',
        'tidak_dijual',
        'desa_id',
    ];

    public function jenisTernak()
    {
        return $this->belongsTo(JenisTernak::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
