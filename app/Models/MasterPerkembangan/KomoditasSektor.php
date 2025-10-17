<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasSektor extends Model
{
    use HasFactory;

    protected $table = 'komoditas_sektor';

    protected $fillable = ['nama'];
}
