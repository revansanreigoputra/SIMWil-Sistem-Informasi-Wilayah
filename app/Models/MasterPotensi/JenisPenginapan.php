<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenginapan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penginapan';

    protected $fillable = [
        'nama',
    ];
}
