<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\KomoditasBuah;

class HasilProduksiBuah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function komoditas()
    {
        return $this->belongsTo(KomoditasBuah::class, 'komoditas_buah_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}