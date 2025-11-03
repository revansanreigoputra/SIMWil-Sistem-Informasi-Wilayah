<?php

namespace App\Models;

use App\Models\MasterPerkembangan\KomoditasObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApotikHidup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function komoditas()
    {
        return $this->belongsTo(KomoditasObat::class, 'komoditas_obat_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}