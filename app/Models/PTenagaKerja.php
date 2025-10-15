<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTenagaKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'tenaga_kerja',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
    ];
}
