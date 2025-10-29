<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenyakit extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    protected $table = 'jenis_penyakits'; // <- pastikan sesuai nama tabel di database
}
