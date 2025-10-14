<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasWabah extends Model
{
    use HasFactory;

    protected $table = 'komoditas_wabah';

    protected $fillable = ['nama'];
}
