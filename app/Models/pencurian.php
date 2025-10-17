<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencurian extends Model
{
    use HasFactory;

    protected $table = 'pencurians';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'kasus_tahun_ini',
        'korban_penduduk_setempat',
        'pelaku_penduduk_setempat',
        'pencurian_bersenjata_api',
        'pelaku_diadili',
    ];

    /**
     * Relasi ke tabel desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
