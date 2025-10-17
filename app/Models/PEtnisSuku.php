<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEtnisSuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'etnis_suku',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
    ];
}
