<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTernak extends Model
{
    use HasFactory;

    protected $table = 'jenis_ternak';

    protected $fillable = [
        'nama',
    ];
}
