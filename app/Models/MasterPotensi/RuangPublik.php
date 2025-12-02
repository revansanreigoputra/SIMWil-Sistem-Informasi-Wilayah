<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangPublik extends Model
{
    use HasFactory;

    protected $table = 'ruang_publik';

    protected $fillable = [
        'nama',
    ];
}
