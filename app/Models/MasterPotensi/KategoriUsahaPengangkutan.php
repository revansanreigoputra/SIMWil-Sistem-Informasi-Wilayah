<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUsahaPengangkutan extends Model
{
    use HasFactory;

    protected $table = 'kategori_usaha_pengangkutan';

    protected $fillable = ['nama',];
}
