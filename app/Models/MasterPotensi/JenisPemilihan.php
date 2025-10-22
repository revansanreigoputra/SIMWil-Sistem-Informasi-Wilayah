<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPemilihan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pemilihan';

    protected $fillable = [
        'nama',
        'kondisi_pemanfaatan',
    ];
}
