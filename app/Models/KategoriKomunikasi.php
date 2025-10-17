<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKomunikasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_komunikasis';
    protected $fillable = ['nama'];

    /**
     * Relasi: satu kategori punya banyak jenis komunikasi
     */
    public function jenisKomunikasi()
    {
        return $this->hasMany(JenisKomunikasi::class, 'kategori_id');
    }

    /**
     * Relasi: satu kategori bisa punya banyak data komunikasi_informasi
     */
    public function komunikasiInformasi()
    {
        return $this->hasMany(KomunikasiInformasi::class, 'kategori_id');
    }
}