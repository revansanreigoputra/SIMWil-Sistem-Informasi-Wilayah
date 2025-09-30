<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glosarium extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika nama model tidak jamak
    protected $table = 'glosarium';

    // Tentukan kolom mana saja yang boleh diisi
    protected $fillable = [
        'istilah',
        'deskripsi',
    ];
}

