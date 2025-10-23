<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasWilayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tahun_pembentukan',
        'luas_desa',
        'kepala_desa',
        'nama_pengisi',
        'pekerjaan',
        'jabatan',
        'tanggal',
        'desa_utara',
        'desa_selatan',
        'desa_timur',
        'desa_barat',
        'kec_utara',
        'kec_selatan',
        'kec_timur',
        'kec_barat',
        'penetapan_batas',
        'dasar_hukum_perdes',
        'dasar_hukum_perda',
        'peta_wilayah',
        'referensi_1',
        'referensi_2',
        'referensi_3',
        'referensi_4',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}