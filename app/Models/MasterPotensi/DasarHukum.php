<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DasarHukum extends Model
{
    use HasFactory;

    protected $table = 'dasar_hukum';

    protected $fillable = [
        'nama',
    ];
}
