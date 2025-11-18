<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\JenisLembaga; 
use App\Models\MasterPotensi\DasarHukum; 
use App\Models\Desa;

class LembagaKemasyarakatan extends Model
{
    use HasFactory;

    protected $table = 'lembaga_kemasyarakatans';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jenis_lembaga_id',
        'jumlah',
        'dasar_hukum_id',
        'jumlah_pengurus',
        'alamat_kantor',
        'jumlah_jenis_kegiatan',
        'ruang_lingkup_kegiatan',
    ];

    // Relasi ke tabel Jenis Lembaga
    public function jenisLembaga()
    {
        return $this->belongsTo(JenisLembaga::class, 'jenis_lembaga_id');
    }

    public function dasarHukum()
    {
        return $this->belongsTo(DasarHukum::class, 'dasar_hukum_id');
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
