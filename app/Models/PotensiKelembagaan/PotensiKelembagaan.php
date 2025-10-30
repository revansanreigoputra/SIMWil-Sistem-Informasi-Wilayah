<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;

class PotensiKelembagaan extends Model
{
    protected $table = 'potensi_kelembagaans';
    protected $fillable = [
        'tanggal_data',
        'dasar_hukum_pembentukan',
        'dasar_hukum_pembentukan_bpd',
        'jumlah_aparat_pemerintah',
        'jumlah_perangkat_desa',
        'jumlah_staf',
        'jumlah_dusun',
    ];
}
