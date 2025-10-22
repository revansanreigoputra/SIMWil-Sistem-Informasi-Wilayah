<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanRillKeluarga extends Model
{
    use HasFactory;

    protected $table = 'pendapatan_rill_keluargas';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'kk',
        'ak',
        'pendapatan_kk',
        'pendapatan_ak',
        'total1',
        'total2',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
