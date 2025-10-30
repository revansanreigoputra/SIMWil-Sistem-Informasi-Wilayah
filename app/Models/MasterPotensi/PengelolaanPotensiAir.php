<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengelolaanPotensiAir extends Model
{
    use HasFactory;

    protected $table = 'pengelolaan_potensi_air';

    protected $fillable = [
        'nama',
        'kategori',
    ];
}
