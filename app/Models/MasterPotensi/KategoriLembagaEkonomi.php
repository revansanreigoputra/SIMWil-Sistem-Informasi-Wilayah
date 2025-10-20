<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLembagaEkonomi extends Model
{
    use HasFactory;

    protected $table = 'kategori_lembaga_ekonomi';

    protected $fillable = ['nama',];
    
    public function jenis()
    {
        return $this->hasMany(JenisLembagaEkonomi::class, 'kategori_lembaga_ekonomi_id');
    }

}
