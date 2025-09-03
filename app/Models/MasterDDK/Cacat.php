<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class Cacat extends Model
{
    protected $table = 'cacats';

    protected $fillable = [
        'tipe',
        'nama_cacat',
    ];
}
