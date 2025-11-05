<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\KomoditasPangan;

class HasilProduksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function komoditas()
    {
        return $this->belongsTo(KomoditasPangan::class, 'komoditas_pangan_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}