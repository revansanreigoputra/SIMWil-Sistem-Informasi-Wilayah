<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUsahaJasaDanHiburan extends Model
{
    use HasFactory;

    protected $table = 'kategori_usaha_jasa_dan_hiburan';

    protected $fillable = ['nama',];
}
