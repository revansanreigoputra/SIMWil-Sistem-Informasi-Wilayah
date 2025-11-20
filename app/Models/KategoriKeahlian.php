<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKeahlian extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit agar 100% benar
    protected $table = 'kategori_keahlians';

    protected $fillable = ['nama'];
}
