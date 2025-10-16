<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasIbu extends Model
{
    use HasFactory;

    protected $table = 'kualitas_ibu';

    protected $fillable = ['nama'];
}
