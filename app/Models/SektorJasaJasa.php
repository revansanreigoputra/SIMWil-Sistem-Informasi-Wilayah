<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorJasaJasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jumlah_pelayanan_pemerintah',
        'nilai_transaksi_pemerintah',
        'biaya_pelayanan_pemerintah',
        'jumlah_usaha_swasta',
        'nilai_aset_swasta',
        'biaya_swasta',
        'jumlah_usaha_hiburan',
        'nilai_transaksi_hiburan',
        'biaya_hiburan',
        'jumlah_jasa_perorangan',
        'nilai_aset_perorangan',
        'nilai_transaksi_perorangan',
        'biaya_perorangan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
