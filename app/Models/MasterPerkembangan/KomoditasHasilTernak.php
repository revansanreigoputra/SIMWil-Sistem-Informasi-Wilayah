<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasHasilTernak extends Model
{
    use HasFactory;

    protected $table = 'komoditas_hasil_ternak';

    protected $fillable = ['nama'];
}
