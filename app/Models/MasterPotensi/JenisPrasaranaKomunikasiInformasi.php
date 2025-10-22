<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrasaranaKomunikasiInformasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_prasarana_komunikasi_informasi';
    protected $fillable = [
        'kategori_prasarana_komunikasi_informasi_id',
        'nama',
    ];

    // Relasi ke kategori
    public function KategoriPrasaranaKomunikasiInformasi()
    {
        return $this->belongsTo(KategoriPrasaranaKomunikasiInformasi::class, 'kategori_prasarana_komunikasi_informasi_id');
    }
}
