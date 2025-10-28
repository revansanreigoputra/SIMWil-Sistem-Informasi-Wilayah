<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsahaPengolahanHasilTernak extends Model
{
    use HasFactory;

    protected $table = 'jenis_usaha_pengolahan_Hasil_ternak';

    protected $fillable = [
        'nama',
    ];
}
