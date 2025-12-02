<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;
use App\Models\Desa;

class LembagaAdat extends Model
{
    protected $fillable = [
        'desa_id',
        'tanggal',
        'pemangku_adat',
        'kepengurusan_adat',
        'rumah_adat',
        'barang_pusaka',
        'naskah_naskah',
        'lainnya',
        'musyawarah_adat',
        'sanksi_adat',
        'upacara_adat_perkawinan',
        'upacara_adat_kematian',
        'upacara_adat_kelahiran',
        'upacara_adat_bercocok_tanam',
        'upacara_adat_perikanan_laut',
        'upacara_adat_bidang_kehutanan',
        'upacara_adat_pengelolaan_sda',
        'upacara_adat_pembangunan_rumah',
        'upacara_adat_penyelesaian_masalah',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'pemangku_adat' => 'boolean',
        'kepengurusan_adat' => 'boolean',
        'rumah_adat' => 'boolean',
        'barang_pusaka' => 'boolean',
        'naskah_naskah' => 'boolean',
        'lainnya' => 'boolean',
        'musyawarah_adat' => 'boolean',
        'sanksi_adat' => 'boolean',
        'upacara_adat_perkawinan' => 'boolean',
        'upacara_adat_kematian' => 'boolean',
        'upacara_adat_kelahiran' => 'boolean',
        'upacara_adat_bercocok_tanam' => 'boolean',
        'upacara_adat_perikanan_laut' => 'boolean',
        'upacara_adat_bidang_kehutanan' => 'boolean',
        'upacara_adat_pengelolaan_sda' => 'boolean',
        'upacara_adat_pembangunan_rumah' => 'boolean',
        'upacara_adat_penyelesaian_masalah' => 'boolean',
    ];
    
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}