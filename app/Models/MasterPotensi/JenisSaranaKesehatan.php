<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSaranaKesehatan extends Model
{
    use HasFactory;

    protected $table = 'jenis_sarana_kesehatan';

    protected $fillable = [
        'nama',
    ];
}
