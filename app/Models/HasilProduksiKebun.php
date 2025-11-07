<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MasterPerkembangan\KomoditasPerkebunan;

class HasilProduksiKebun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function komoditas()
    {
        return $this->belongsTo(KomoditasPerkebunan::class, 'komoditas_perkebunan_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}