<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class miras extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi plural Eloquent
    protected $table = 'miras';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_warung_miras',
        'jumlah_penduduk_miras',
        'jumlah_kasus_mabuk_miras',
        'jumlah_pengedar_narkoba',
        'jumlah_penduduk_narkoba',
        'jumlah_kasus_teler_narkoba',
        'jumlah_kasus_kematian_narkoba',
        'jumlah_pelaku_miras_diadili',
        'jumlah_pelaku_narkoba_diadili',
    ];

    // Tipe data khusus
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke Desa (asumsi ada model Desa)
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

}
