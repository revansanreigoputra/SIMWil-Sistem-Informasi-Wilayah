<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembagas';  

    protected $fillable = [
        'jenis_lembaga',
        'nama_lembaga',
    ];
}
