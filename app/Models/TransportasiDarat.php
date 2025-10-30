<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportasiDarat extends Model
{
    protected $fillable = [
        'desa_id',
        'tanggal',
        'kategori',
        'jenis_sarana_prasarana',
        'kondisi_baik',
        'kondisi_rusak',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'kategori' => 'string',
        'jenis_sarana_prasarana' => 'string',
        'kondisi_baik' => 'integer',
        'kondisi_rusak' => 'integer',
        'jumlah' => 'integer',
    ];

    public static function getKategoriOptions()
    {
        return [
            'jalan_desa' => 'Jalan Desa',
            'jalan_kabupaten' => 'Jalan Kabupaten',
        ];
    }

    public static function getJenisSaranaPrasaranaOptions()
    {
        return [
            'panjang_jalan_tanah' => 'Panjang Jalan Tanah',
            'panjang_jalan_aspal' => 'Panjang Jalan Aspal',
        ];
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}