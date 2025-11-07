<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanProduksiKehutanan extends Model
{
    use HasFactory;

    protected $table = 'satuan_produksi_kehutanan';
    protected $fillable = ['nama'];
}