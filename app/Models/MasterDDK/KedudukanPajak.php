<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class KedudukanPajak extends Model
{
    protected $table = 'kedudukan_pajaks';

    protected $fillable = [
        'kedudukan_pajak',
    ];
}
