<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teror extends Model
{
    use HasFactory;

    protected $table = 'terors'; // nama tabel

    protected $fillable = [
        'id_desa',
        'tanggal',
        'jumlah_kasus_intimidasi_dalam_desa',
        'jumlah_kasus_intimidasi_luar_desa',
        'jumlah_kasus_selebaran_gelap',
        'jumlah_kasus_terorisme',
        'jumlah_kasus_hasutan_pemaksaan',
        'jumlah_penyelesaian_kasus',
    ];

    /**
     * Relasi ke model Desa.
     * Setiap data teror dimiliki oleh satu desa.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
