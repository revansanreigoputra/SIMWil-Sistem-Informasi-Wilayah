<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HidupBersih extends Model
{
    use HasFactory;

    protected $table = 'hidup_bersih';

    protected $fillable = [
        'nama',
    ];
}
