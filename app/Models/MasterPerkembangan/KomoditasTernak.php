<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasTernak extends Model
{
    use HasFactory;

    protected $table = 'komoditas_ternak';

    protected $fillable = ['nama'];
}
