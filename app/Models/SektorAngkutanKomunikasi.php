<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorAngkutanKomunikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jml_kegiatan_pengangkutan',
        'jml_total_kendaraan_angkutan',
        'nilai_total_transaksi_pengangkutan',
        'nilai_total_biaya_dikeluarkan',
        'jml_kegiatan_pelabuhan_terminal',
        'total_nilai_transaksi_penunjang',
        'nilai_biaya_antara_dikeluarkan',
        'jml_kegiatan_informasi_telekomunikasi',
        'jml_nilai_aset_telekomunikasi',
        'nilai_transaksi_informasi',
        'biaya_dikeluarkan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
