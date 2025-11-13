<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = 'pajaks';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jenis_pajak',
        'jumlah_wajib_pajak',
        'target_pbb',
        'realisasi_pbb',
        'jumlah_tindakan_penunggak_pbb',
        'jenis_retribusi',
        'jumlah_wajib_retribusi',
        'target_retribusi',
        'realisasi_retribusi',
        'jenis_pungutan_resmi',
        'target_pungutan_resmi',
        'realisasi_pungutan_resmi',
        'jumlah_kasus_pungli',
        'jumlah_penyelesaian_pungli',
    ];

    /**
     * Relasi ke tabel desa.
     * Misal kamu punya model Desa, bisa aktifkan relasi di bawah.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
