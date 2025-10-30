<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberAirBersih extends Model
{
    use HasFactory;

    protected $table = 'sumber_air_bersih';

    protected $fillable = [
        'nama',
    ];
}
