<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomunikasiInformasi extends Model
{
    use HasFactory;

    protected $table = 'komunikasi_informasis';
    protected $fillable = [
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
        return $this->belongsTo(KategoriKomunikasi::class, 'kategori_id');
    }

    /**
     * Relasi ke jenis komunikasi
     */
    public function jenis()
    {
        return $this->belongsTo(JenisKomunikasi::class, 'jenis_id');
    }
}