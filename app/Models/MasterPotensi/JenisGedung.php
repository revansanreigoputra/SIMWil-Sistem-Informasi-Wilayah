<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisGedung extends Model
{
    use HasFactory;

    protected $table = 'jenis_gedung';

    protected $fillable = [
        'nama',
    ];
}
