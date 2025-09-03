<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class MataPencaharian extends Model
{
    protected $table = 'mata_pencaharians';

    protected $fillable = [
        'mata_pencaharian',
        'keterangan',
    ];
}
