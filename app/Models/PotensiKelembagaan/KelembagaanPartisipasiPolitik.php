<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PotensiKelembagaan\PartisipasiPolitik;
use App\Models\Desa;

class KelembagaanPartisipasiPolitik extends Model
{
    use HasFactory;

    protected $table = 'kelembagaan_partisipasi_politik';

    protected $fillable = [
        'desa_id',
        'partisipasi_politik_id',
        'tanggal',
        'jumlah_wanita_hak_pilih',
        'jumlah_pria_hak_pilih',
        'jumlah_pemilih',
        'jumlah_wanita_memilih',
        'jumlah_pria_memilih',
        'jumlah_penggunaan_hak_pilih',
        'persentase',
    ];

    // Relasi ke tabel partisipasi_politik
    public function partisipasiPolitik()
    {
        return $this->belongsTo(PartisipasiPolitik::class, 'partisipasi_politik_id');
    }
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id');
    }

}
