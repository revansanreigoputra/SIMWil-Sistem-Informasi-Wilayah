<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\KategoriLembagaEkonomi;
use App\Models\MasterPotensi\JenisLembagaEkonomi;

class LembagaEkonomi extends Model
{
    use HasFactory;

    protected $table = 'lembaga_ekonomi';

    protected $fillable = [
        'tanggal',
        'kategori_lembaga_ekonomi_id',
        'jenis_lembaga_ekonomi_id',
        'jumlah',
        'jumlah_kegiatan',
        'jumlah_pengurus',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLembagaEkonomi::class, 'kategori_lembaga_ekonomi_id');
    }

    public function jenis()
    {
        return $this->belongsTo(JenisLembagaEkonomi::class, 'jenis_lembaga_ekonomi_id');
    }
}
