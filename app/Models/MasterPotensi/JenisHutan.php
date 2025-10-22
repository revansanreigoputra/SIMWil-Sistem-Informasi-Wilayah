<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisHutan extends Model
{
    use HasFactory;

    protected $table = 'jenis_hutan';

    protected $fillable = [
        'nama',
    ];
}
