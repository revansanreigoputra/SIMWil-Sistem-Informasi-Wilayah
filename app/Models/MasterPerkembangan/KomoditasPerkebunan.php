<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasPerkebunan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_perkebunan';

    protected $fillable = ['nama'];
}
