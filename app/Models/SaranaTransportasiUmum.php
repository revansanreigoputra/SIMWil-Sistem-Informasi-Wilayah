<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaTransportasiUmum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'tanggal',
        'jenis_aset', // sekarang berisi ID dari master aset_sarana
        'jumlah_pemilik',
        'jumlah_aset',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function asetSarana()
    {
        return $this->belongsTo(\App\Models\MasterPerkembangan\AsetSarana::class, 'jenis_aset');
    }
}
