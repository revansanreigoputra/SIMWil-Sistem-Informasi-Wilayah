<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenentuanKepalaDesa extends Model
{
    use HasFactory;

    protected $table = 'penentuan_kepala_desa';

    protected $fillable = ['nama'];
}
