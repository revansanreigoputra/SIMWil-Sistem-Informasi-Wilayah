<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelembagaanPendidikanMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'kelembagaan_pendidikan_masyarakats';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'perpustakaan_desa',
        'taman_bacaan',
        'perpustakaan_keliling',
        'sanggar_belajar',
        'kegiatan_lps',
        'kelompok_a',
        'peserta_a',
        'kelompok_b',
        'peserta_b',
        'kelompok_c',
        'peserta_c',
        'kursus_unit',
        'peserta_kursus',
    ];

    // Cast tanggal jadi Carbon otomatis
    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
