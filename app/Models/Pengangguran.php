<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;
use App\Models\Desa;

class Pengangguran extends Model
{
    use HasFactory;

    protected $table = 'penganggurans';

    protected $fillable = [
        'id_kecamatan',
        'id_desa',
        'tanggal',
        'angkatan_kerja',
        'masih_sekolah',
        'ibu_rumah_tangga',
        'bekerja_penuh',
        'bekerja_tidak_tentu',
        'tidak_bekerja',
        'bekerja',
    ];

    // Relasi ke Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    // Relasi ke Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
