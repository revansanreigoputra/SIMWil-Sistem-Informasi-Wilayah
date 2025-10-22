<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDampak extends Model
{
    use HasFactory;

    protected $table = 'jenis_dampak';

    protected $fillable = [
        'nama',
    ];
}
