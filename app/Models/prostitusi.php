<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prostitusi extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika mengikuti konvensi Laravel)
    protected $table = 'prostitusis';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_penduduk_pramu_nikmat',
        'lokalisasi_prostitusi',
        'jumlah_tempat_pramunikmat',
        'jumlah_kasus_prostitusi',
        'jumlah_pembinaan_pelaku',
        'jumlah_penertiban_tempat',
    ];

    // Jika ingin otomatis casting tipe kolom tertentu
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke tabel desa (jika ada)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
