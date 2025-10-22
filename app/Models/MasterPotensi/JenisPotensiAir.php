<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPotensiAir extends Model
{
    use HasFactory;

    protected $table = 'jenis_potensi_air';

    protected $fillable = [
        'nama',
        'kondisi_pemanfaatan',
    ];
}
