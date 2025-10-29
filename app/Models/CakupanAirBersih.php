<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakupanAirBersih extends Model
{
    use HasFactory;

    protected $table = 'cakupan_air_bersih';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'sumur_gali',
        'pelanggan_pam',
        'penampung_air_hujan',
        'sumur_pompa',
        'perpipaan_air_kran',
        'hidran_umum',
        'air_sungai',
        'embung',
        'mata_air',
        'tidak_akses_air_laut',
        'tidak_akses_sumber_lain',
        'total_keluarga',
    ];

    /**
     * Relasi ke model Desa.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}