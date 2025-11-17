<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\AsetAtap;

class RumahMenurutAtap extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kec',
        'id_desa',
        'tanggal',
        'id_aset_atap',
        'jumlah',
    ];

    // Relasi ke tabel desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    // Relasi ke master data AsetAtap
    public function asetAtap()
    {
        return $this->belongsTo(AsetAtap::class, 'id_aset_atap');
    }
}
