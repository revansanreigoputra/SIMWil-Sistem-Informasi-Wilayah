<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasHutan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_hutan';

    protected $fillable = ['nama'];
}
