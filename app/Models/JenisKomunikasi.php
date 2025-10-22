<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKomunikasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_komunikasis';
    protected $fillable = ['kategori_id', 'nama'];

    /**
     * Relasi: satu jenis komunikasi milik satu kategori
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriKomunikasi::class, 'kategori_id');
    }

    /**
     * Relasi: satu jenis bisa dipakai di banyak data komunikasi_informasi
     */
    public function komunikasiInformasi()
    {
        return $this->hasMany(KomunikasiInformasi::class, 'jenis_id');
    }
}