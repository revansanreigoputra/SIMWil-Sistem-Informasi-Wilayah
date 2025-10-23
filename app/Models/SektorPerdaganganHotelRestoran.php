<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPerdaganganHotelRestoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_jenis_perdagangan_besar',
        'total_nilai_transaksi_besar',
        'total_nilai_aset_perdagangan_besar',
        'total_biaya_yang_dikeluarkan_besar',
        'biaya_antara_lainnya_besar',
        'jumlah_jenis_perdagangan_kecil',
        'total_nilai_transaksi_kecil',
        'total_biaya_yang_dikeluarkan_kecil',
        'total_nilai_aset_perdagangan_kecil',
        'jumlah_penginapan_dan_akomodasi',
        'total_pendapatan_hotel',
        'total_biaya_pemeliharaan',
        'biaya_antara_hotel',
        'pendapatan_diperoleh_hotel',
        'jumlah_tempat_konsumsi',
        'biaya_konsumsi_dikeluarkan',
        'biaya_antara_restoran',
        'pendapatan_diperoleh_restoran'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
