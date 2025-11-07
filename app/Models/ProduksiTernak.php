<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduksiTernak extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function jenisProduksiTernak()
    {
        return $this->belongsTo(JenisProduksiTernak::class);
    }

    public function satuanProduksiTernak()
    {
        return $this->belongsTo(MasterPotensi\SatuanProduksiTernak::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
