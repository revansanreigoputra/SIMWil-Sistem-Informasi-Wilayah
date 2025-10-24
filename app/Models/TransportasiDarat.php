<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisPrasaranaTransportasiDarat;
use App\Models\MasterPotensi\KategoriPrasaranaTransportasiDarat;
use Illuminate\Database\Eloquent\Model;

class TransportasiDarat extends Model
{
    protected $fillable = [
        'desa_id',
        'tanggal',
        'kategori_prasarana_transportasi_darat_id',
        'jenis_prasarana_transportasi_darat_id',
        'kondisi_baik',
        'kondisi_rusak',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'kondisi_baik' => 'integer',
        'kondisi_rusak' => 'integer',
        'jumlah' => 'integer',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPrasaranaTransportasiDarat::class, 'kategori_prasarana_transportasi_darat_id');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisPrasaranaTransportasiDarat::class, 'jenis_prasarana_transportasi_darat_id');
    }
}