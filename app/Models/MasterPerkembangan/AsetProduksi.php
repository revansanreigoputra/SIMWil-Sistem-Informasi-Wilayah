<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetProduksi extends Model
{
    use HasFactory;

    protected $table = 'aset_produksis'; 
    protected $fillable = ['nama']; 
}
