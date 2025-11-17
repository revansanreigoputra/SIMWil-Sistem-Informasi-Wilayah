<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduksiTernak extends Model
{
    use HasFactory;

    protected $table = 'jenis_produksi_ternaks';

    protected $fillable = [
        'nama',
    ];
}
