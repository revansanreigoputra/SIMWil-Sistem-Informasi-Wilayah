<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\AsetDinding;

class RumahMenurutDinding extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kec', 'id_desa', 'tanggal', 'id_aset_dinding', 'jumlah'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function asetDinding()
    {
        return $this->belongsTo(AsetDinding::class, 'id_aset_dinding');
    }
}
