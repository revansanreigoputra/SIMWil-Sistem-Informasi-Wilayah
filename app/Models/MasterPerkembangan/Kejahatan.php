<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejahatan extends Model
{
    use HasFactory;

    protected $table = 'kejahatans';

    protected $fillable = ['nama'];
}
