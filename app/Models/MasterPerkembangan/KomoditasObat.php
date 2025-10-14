<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasObat extends Model
{
    use HasFactory;

    protected $table = 'komoditas_obat';

    protected $fillable = ['nama'];
}
