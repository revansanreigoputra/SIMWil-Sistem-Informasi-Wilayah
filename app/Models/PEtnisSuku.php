<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEtnisSuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'etnis_id',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
        'desa_id',
    ];

    public function etnis()
    {
        return $this->belongsTo(\App\Models\MasterPerkembangan\Etnis::class);
    }
}
