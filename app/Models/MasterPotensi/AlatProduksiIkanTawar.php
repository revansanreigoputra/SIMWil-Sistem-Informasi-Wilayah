<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatProduksiIkanTawar extends Model
{
    use HasFactory;

    protected $table = 'alat_produksi_ikan_tawar';

    protected $fillable = [
        'nama',
    ];
}
