<?php

namespace App\Models;

use App\Models\MasterDDK\Kewarganegaraan;
use Illuminate\Database\Eloquent\Model;

class PKewarganegaraan extends Model
{
    protected $fillable = [
        'tanggal',
        'kewarganegaraan_id',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
    ];

    public function kewarganegaraan()
    {
        return $this->belongsTo(Kewarganegaraan::class);
    }
}
