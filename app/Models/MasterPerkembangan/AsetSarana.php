<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetSarana extends Model
{
    use HasFactory;

    protected $table = 'aset_sarana';

    protected $fillable = [
        'nama',
    ];
}
