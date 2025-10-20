<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSekolah extends Model
{
    use HasFactory;

    protected $table = 'kategori_sekolah';

    protected $fillable = [
        'nama',];

    public function jenis()
    {
        return $this->hasMany(JenisSekolahTingkatan::class, 'kategori_sekolah_id');
    }
}
