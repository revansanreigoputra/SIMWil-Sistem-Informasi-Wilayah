<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranaTransportasi extends Model
{
    protected $fillable = [
        'desa_id',
        'tanggal',
        'kategori_prasarana_transportasi_lainnya_id',
        'jenis_prasarana_transportasi_lainnya_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\MasterPotensi\KategoriPrasaranaTransportasiLainnya::class, 'kategori_prasarana_transportasi_lainnya_id');
    }

    public function jenis()
    {
        return $this->belongsTo(\App\Models\MasterPotensi\JenisPrasaranaTransportasiLainnya::class, 'jenis_prasarana_transportasi_lainnya_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}