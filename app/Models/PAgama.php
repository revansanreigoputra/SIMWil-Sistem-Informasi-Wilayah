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
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
}
