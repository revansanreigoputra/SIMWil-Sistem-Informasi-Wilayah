<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasBuah extends Model
{
    use HasFactory;

    protected $table = 'komoditas_buahs';

    protected $fillable = ['nama'];
}

