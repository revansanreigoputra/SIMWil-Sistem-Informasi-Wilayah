<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransportasi extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'nama_jenis'];

    /**
     * Relasi: Jenis belongsTo Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriTransportasi::class, 'kategori_id');
    }

    /**
     * Relasi: Jenis dipakai di banyak DataPrasarana
     */
    public function saranaTransportasi()
    {
        return $this->hasMany(SaranaTransportasi::class, 'jenis_id');
    }
}