<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\MasterPerkembangan\KomoditasGalian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositProduksiGalian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function komoditasGalian()
    {
        return $this->belongsTo(KomoditasGalian::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
