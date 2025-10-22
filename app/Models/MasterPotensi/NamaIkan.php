<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaIkan extends Model
{
    use HasFactory;

    protected $table = 'nama_ikan';

    protected $fillable = [
        'nama',
    ];
}
