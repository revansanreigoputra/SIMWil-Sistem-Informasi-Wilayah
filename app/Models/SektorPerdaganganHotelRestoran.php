<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPerdaganganHotelRestoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id', 'tanggal',

        'total_jenis_perdagangan_besar', 'total_nilai_transaksi_besar', 'total_aset_perdagangan_besar', 'total_biaya_dikeluarkan_besar', 'total_biaya_antara_besar',
        'total_jenis_perdagangan_kecil', 'total_nilai_transaksi_kecil', 'total_biaya_dikeluarkan_kecil', 'total_aset_perdagangan_kecil',
        'total_penginapan', 'total_pendapatan_hotel', 'total_biaya_pemeliharaan_hotel', 'total_biaya_antara_hotel', 'total_pendapatan_diperoleh_hotel',
        'total_tempat_konsumsi', 'biaya_konsumsi_dikeluarkan', 'biaya_lainnya_restoran', 'total_pendapatan_restoran',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
