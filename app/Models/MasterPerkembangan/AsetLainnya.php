<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetLainnya extends Model
{
    use HasFactory;

    protected $table = 'aset_lainnya';

    protected $fillable = [
        'nama',
    ];
}
