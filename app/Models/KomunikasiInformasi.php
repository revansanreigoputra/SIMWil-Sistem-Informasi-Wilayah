<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunikasiInformasi extends Model
{
    use HasFactory;

    protected $table = 'komunikasi_informasis';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'kategori_id',
        'jenis_id',
        'jumlah',
        'satuan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke kategori komunikasi
     */
    public function kategori()
    {
        return $this->belongsTo(\App\Models\MasterPotensi\KategoriPrasaranaKomunikasiInformasi::class, 'kategori_id');
    }

    /**
     * Relasi ke jenis komunikasi
     */
    public function jenis()
    {
        return $this->belongsTo(\App\Models\MasterPotensi\JenisPrasaranaKomunikasiInformasi::class, 'jenis_id');
    }

    /**
     * Relasi ke desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}