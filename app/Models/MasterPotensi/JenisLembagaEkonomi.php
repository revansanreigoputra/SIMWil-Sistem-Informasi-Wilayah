<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLembagaEkonomi extends Model
{
    use HasFactory;

    protected $table = 'jenis_lembaga_ekonomi';
    protected $fillable = [
        'kategori_lembaga_ekonomi_id',
        'nama',
    ];

    // Relasi ke kategori
    public function kategoriLembagaEkonomi()
    {
        return $this->belongsTo(KategoriLembagaEkonomi::class, 'kategori_lembaga_ekonomi_id');
    }
}
