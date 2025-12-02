<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencemaran extends Model
{
    use HasFactory;

    protected $table = 'pencemaran';

    protected $fillable = [
        'nama',
    ];
}
