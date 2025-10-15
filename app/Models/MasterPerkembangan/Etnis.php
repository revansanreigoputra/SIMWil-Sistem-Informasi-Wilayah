<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnis extends Model
{
    use HasFactory;

    protected $table = 'etnis';

    protected $fillable = [
        'nama',
    ];
}
