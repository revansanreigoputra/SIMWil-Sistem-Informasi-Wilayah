<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetTanah extends Model
{
    use HasFactory;

    protected $table = 'aset_tanah';

    protected $fillable = [
        'nama',
    ];
}
