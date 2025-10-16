<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualitasBayi extends Model
{
    use HasFactory;

    protected $table = 'kualitas_bayi';

    protected $fillable = ['nama'];
}
