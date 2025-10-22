<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembinaankecamatan extends Model
{
     use HasFactory;

    // Nama tabel
    protected $table = 'pembinaankecamatans';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'id_desa',
        'tanggal',
        'fasilitasi_penyusunan_perdes',
        'fasilitasi_administrasi_tata_pemerintahan',
        'fasilitasi_pengelolaan_keuangan',
        'fasilitasi_urusan_otonomi',
        'fasilitasi_penerapan_peraturan',
        'fasilitasi_penyediaan_data',
        'fasilitasi_pelaksanaan_tugas',
        'fasilitasi_ketenteraman',
        'fasilitasi_penetapan_penguatan',
        'penanggulangan_kemiskinan_apbd',
        'fasilitasi_partisipasi_masyarakat',
        'fasilitasi_kerjasama_desa',
        'fasilitasi_program_pemberdayaan',
        'fasilitasi_kerjasama_lembaga',
        'fasilitasi_bantuan_teknis',
        'fasilitasi_koordinasi_unit_kerja',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
