<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTransportasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    /**
     * Relasi: Kategori punya banyak Jenis
     */
    public function jenisTransportasi()
    {
        return $this->hasMany(JenisTransportasi::class, 'kategori_id');
    }

    /**
     * Relasi: Kategori dipakai di banyak DataPrasarana
     */
    public function saranaTransportasi()
    {
        return $this->hasMany(SaranaTransportasi::class, 'kategori_id');
    }
}