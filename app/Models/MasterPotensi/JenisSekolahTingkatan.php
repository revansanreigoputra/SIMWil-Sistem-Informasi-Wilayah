<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSekolahTingkatan extends Model
{
    use HasFactory;

    protected $table = 'jenis_sekolah_tingkatan';
    protected $fillable = [
        'kategori_sekolah_id',
        'nama',
    ];

    // Relasi ke kategori
    public function KategoriSekolah()
    {
        return $this->belongsTo(KategoriSekolah::class, 'kategori_sekolah_id');
    }
}
