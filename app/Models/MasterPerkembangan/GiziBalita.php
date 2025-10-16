<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiziBalita extends Model
{
    use HasFactory;

    protected $table = 'gizi_balita';

    protected $fillable = [
        'nama',
    ];
}
