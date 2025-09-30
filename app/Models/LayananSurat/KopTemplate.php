<?php

namespace App\Models\LayananSurat;

use Illuminate\Database\Eloquent\Model;

class KopTemplate extends Model
{
    protected $table = 'kop_templates';

    protected $fillable = [
        'jenis_kop',
        'nama',
        'logo',
    ];
}
