<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class KualitasAngkatanKerja extends Model
{
    protected $table = 'kualitas_angkatan_kerjas';

    protected $fillable = [
        'kualitas_angkatan_kerja',
    ];
}
