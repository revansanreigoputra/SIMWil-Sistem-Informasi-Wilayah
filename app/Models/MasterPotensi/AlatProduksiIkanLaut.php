<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatProduksiIkanLaut extends Model
{
    use HasFactory;

    protected $table = 'alat_produksi_ikan_laut';

    protected $fillable = [
        'nama',
    ];
}
