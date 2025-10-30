<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasAlatPerikanan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_alat_perikanans';

    protected $fillable = ['nama'];
}
