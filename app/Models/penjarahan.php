<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjarahan extends Model
{
    use HasFactory;

    protected $table = 'penjarahans'; // nama tabel sesuai migration

    protected $fillable = [
        'desa_id',
        'tanggal',
        'korban_dan_pelaku_penduduk_setempat',
        'korban_penduduk_setempat_pelaku_bukan_setempat',
        'korban_bukan_setempat_pelaku_penduduk_setempat',
        'pelaku_diadili_atau_diproses_hukum',
    ];

    /**
     * Relasi ke tabel desa (jika ada tabel desas)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
