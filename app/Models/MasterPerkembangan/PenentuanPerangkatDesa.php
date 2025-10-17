<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenentuanPerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'penentuan_perangkat_desa';

    protected $fillable = ['nama'];
}
