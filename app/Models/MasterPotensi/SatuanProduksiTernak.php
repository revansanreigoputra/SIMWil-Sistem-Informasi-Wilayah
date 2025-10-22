<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanProduksiTernak extends Model
{
    use HasFactory;

    protected $table = 'satuan_produksi_ternak';

    protected $fillable = [
        'nama',
    ];
}
