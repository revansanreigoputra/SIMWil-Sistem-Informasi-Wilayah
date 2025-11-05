<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorKeuanganJasaPerusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_transaksi_perbankan',
        'nilai_transaksi_perbankan',
        'biaya_perbankan',
        'jumlah_lembaga_bukan_bank',
        'jumlah_kegiatan_lembaga_bukan_bank',
        'nilai_transaksi_bukan_bank',
        'biaya_bukan_bank',
        'jumlah_usaha_sewa',
        'nilai_sewa',
        'biaya_sewa',
        'biaya_lain_sewa',
        'jumlah_perusahaan_jasa',
        'nilai_transaksi_perusahaan',
        'biaya_perusahaan',
        'biaya_lain_perusahaan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
