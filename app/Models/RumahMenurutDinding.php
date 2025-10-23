<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function jenisDinding()
    {
        return $this->belongsTo(JenisDinding::class, 'id_aset_dinding');
    }
}
