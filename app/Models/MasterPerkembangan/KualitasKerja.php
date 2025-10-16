<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasKerja extends Model
{
    use HasFactory;

    protected $table = 'kualitas_kerja';

    protected $fillable = ['nama'];
}
