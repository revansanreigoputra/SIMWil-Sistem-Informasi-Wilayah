<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorListrikGasAirMinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_kegiatan_listrik',
        'nilai_produksi_listrik',
        'total_nilai_transaksi_listrik',
        'biaya_antara_listrik',
        'jumlah_kegiatan_gas',
        'nilai_aset_produksi_gas',
        'nilai_transaksi_gas',
        'biaya_antara_gas',
        'jumlah_kegiatan_air',
        'nilai_aset_air',
        'nilai_produksi_air',
        'nilai_transaksi_air',
        'biaya_antara_air',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
