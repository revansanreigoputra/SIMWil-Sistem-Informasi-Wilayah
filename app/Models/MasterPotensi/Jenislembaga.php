<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenislembaga extends Model
{
    use HasFactory;

    protected $table = 'jenis_lembaga';

    protected $fillable = [
        'nama',
    ];
}
