<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasKerajinan extends Model
{
     use HasFactory;

    protected $table = 'komoditas_kerajinan';

    protected $fillable = ['nama'];
}
