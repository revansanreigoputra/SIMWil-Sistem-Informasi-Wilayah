<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranaTransportasi extends Model
{
    protected $fillable = [
        'tanggal',
        'kategori_id',
        'jenis_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriTransportasi::class, 'kategori_id');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisTransportasi::class, 'jenis_id');
    }
}
