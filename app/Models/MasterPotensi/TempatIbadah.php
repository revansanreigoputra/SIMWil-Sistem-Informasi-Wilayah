<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    use HasFactory;

    protected $table = 'tempat_ibadah';

    protected $fillable = [
        'nama',
    ];
}
