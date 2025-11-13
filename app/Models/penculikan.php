<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penculikan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'penculikans';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_kasus_penculikan',
        'jumlah_kasus_korban_penduduk',
        'jumlah_kasus_pelaku_penduduk',
        'jumlah_kasus_diproses_hukum',
    ];

    // Jika tabel berelasi dengan tabel desa, tambahkan relasi berikut:
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
