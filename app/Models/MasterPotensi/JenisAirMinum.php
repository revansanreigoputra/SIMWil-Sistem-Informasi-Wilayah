<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAirMinum extends Model
{
     use HasFactory;

    protected $table = 'jenis_air_minum';

    protected $fillable = [
        'nama',
    ];
}
