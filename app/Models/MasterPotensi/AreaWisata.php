<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaWisata extends Model
{
    use HasFactory;

    protected $table = 'area_wisata';

    protected $fillable = [
        'nama',
    ];
}
