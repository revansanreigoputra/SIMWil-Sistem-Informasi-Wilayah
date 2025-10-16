<?php

namespace App\Models;

use App\Models\MasterDDK\Cacat;
use Illuminate\Database\Eloquent\Model;

class PCacat extends Model
{
    protected $fillable = [
        'tanggal',
        'cacat_id',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
    ];

    public function cacat()
    {
        return $this->belongsTo(Cacat::class);
    }
}
