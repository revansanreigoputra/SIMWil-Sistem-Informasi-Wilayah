<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kdrt extends Model
{
    use HasFactory;
    /**
     * Kolom yang boleh diisi (mass assignable)
     */
    protected $table = 'kdrts';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_kasus_suami_terhadap_istri',
        'jumlah_kasus_istri_terhadap_suami',
        'jumlah_kasus_orangtua_terhadap_anak',
        'jumlah_kasus_anak_terhadap_orangtua',
        'jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya',
    ];

    /**
     * Relasi ke model Desa (opsional, jika tabel desa ada)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
