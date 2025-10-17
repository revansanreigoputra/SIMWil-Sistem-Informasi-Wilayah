<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persalinan extends Model
{
    use HasFactory;

    protected $table = 'persalinan';

    protected $fillable = ['nama'];
}
