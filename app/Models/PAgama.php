<?php

namespace App\Models;

use App\Models\MasterDDK\Agama;
use Illuminate\Database\Eloquent\Model;

class PAgama extends Model
{
    protected $table = 'p_agamas';

    protected $fillable = [
        'tanggal',
        'id_agama',
        'laki',
        'perempuan',
        'total',
        'desa_id',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
