<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasPerikanan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_perikanan';

    protected $fillable = ['nama'];
}
