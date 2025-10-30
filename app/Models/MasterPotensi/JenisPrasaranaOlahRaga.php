<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrasaranaOlahRaga extends Model
{
    use HasFactory;

    protected $table = 'jenis_prasarana_olah_raga';

    protected $fillable = [
        'nama',
    ];
}
