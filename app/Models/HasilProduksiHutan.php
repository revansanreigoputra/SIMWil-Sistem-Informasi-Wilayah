<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\KomoditasHutan;
use App\Models\SatuanProduksiKehutanan;


class HasilProduksiHutan extends Model
{
    use HasFactory;

    protected $table = 'hasil_produksi_hutans';

    protected $fillable = [
        'tanggal',
        'desa_id',
        'komoditas_hutan_id',
        'hasil_produksi',
        'satuan_produksi_kehutanan_id',
        'dijual_langsung_ke_konsumen',
        'dijual_ke_pasar',
        'dijual_melalui_kud',
        'dijual_melalui_tengkulak',
        'dijual_melalui_pengecer',
        'dijual_ke_lumbung_desa_kelurahan',
        'tidak_dijual',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function komoditas()
    {
        return $this->belongsTo(KomoditasHutan::class, 'komoditas_hutan_id');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanProduksiKehutanan::class, 'satuan_produksi_kehutanan_id');
    }
}