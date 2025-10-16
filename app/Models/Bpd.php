<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bpd extends Model
{

    protected $table = 'bpd';
    
    protected $fillable = [
        'desa_id',
        'tanggal',
        'gedung_kantor',
        'ruang_kerja',
        'balai_bpd',
        'kondisi',
        'listrik',
        'air_bersih',
        'telepon',
        'mesin_tik',
        'meja',
        'kursi',
        'lemari_arsip',
        'komputer',
        'mesin_fax',
        'inventaris_lainnya',
        'buku_administrasi_kegiatan',
        'buku_administrasi_keanggotaan',
        'buku_kegiatan',
        'buku_himpunan_peraturan_desa',
        'administrasi_lainnya',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}