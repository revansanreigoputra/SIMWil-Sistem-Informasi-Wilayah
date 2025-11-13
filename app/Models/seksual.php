<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seksual extends Model
{
    use HasFactory;

    protected $table = 'seksuals';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_kasus_perkosaan',
        'jumlah_kasus_perkosaan_anak',
        'jumlah_kasus_hamil_luar_nikah_hukum_negara',
        'jumlah_kasus_hamil_luar_nikah_hukum_adat',
        'jumlah_tempat_penampungan_pekerja_seks',
    ];

    /**
     * Relasi ke tabel desa (jika ada)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
