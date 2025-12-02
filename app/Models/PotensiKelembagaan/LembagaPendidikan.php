<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\KategoriSekolah;
use App\Models\MasterPotensi\JenisSekolahTingkatan;
use App\Models\Desa;

class LembagaPendidikan extends Model
{
    use HasFactory;

    protected $table = 'lembaga_pendidikan';

    protected $fillable = [
        'desa_id',
        'kategori_id',
        'jenis_sekolah_id',
        'tanggal',
        'status',
        'jumlah_negeri',
        'jumlah_swasta',
        'jumlah_dimiliki_desa',
        'jumlah',
        'jumlah_pengajar',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSekolah::class, 'kategori_id');
    }
    public function jenisSekolah()
    {
        return $this->belongsTo(JenisSekolahTingkatan::class, 'jenis_sekolah_id');
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
