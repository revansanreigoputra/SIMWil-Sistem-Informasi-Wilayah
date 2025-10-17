<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasPangan extends Model
{
    use HasFactory;

    protected $table = 'komoditas_pangan';

    protected $fillable = ['nama'];
}
