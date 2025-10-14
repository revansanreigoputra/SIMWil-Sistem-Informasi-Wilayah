<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasGalian extends Model
{
    use HasFactory;

     protected $table = 'komoditas_galians';

    protected $fillable = ['nama'];
}

