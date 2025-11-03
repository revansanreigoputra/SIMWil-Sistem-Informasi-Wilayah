<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAset extends Model
{
    use HasFactory;

    protected $table = 'jenis_asets';
    protected $fillable = ['nama_aset'];
}
