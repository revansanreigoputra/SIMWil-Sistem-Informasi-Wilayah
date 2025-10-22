<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrasaranaKesehatan extends Model
{
    use HasFactory;

    protected $table = 'jenis_prasarana_kesehatan';

    protected $fillable = [
        'nama',
    ];
}
