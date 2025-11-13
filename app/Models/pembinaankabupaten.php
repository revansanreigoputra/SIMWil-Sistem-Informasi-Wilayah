<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembinaankabupaten extends Model
{
    use HasFactory;

    protected $fillable = [
    'desa_id',
    'tanggal',
    'pelimpahan_tugas',
    'pengaturan_kewenangan',
    'pedoman_pelaksanaan_tugas',
    'pedoman_penyusunan_peraturan',
    'pedoman_penyusunan_perencanaan',
    'kegiatan_fasilitasi_keberadaan',
    'penetapan_pembiayaan',
    'fasilitasi_pelaksanaan_pedoman',
    'jumlah_kegiatan_pendidikan',
    'kegiatan_penanggulangan_kemiskinan',
    'kegiatan_penanganan_bencana',
    'kegiatan_peningkatan_pendapatan',
    'fasilitasi_penetapan_pedoman',
    'kegiatan_fasilitasi_lanjutan',
    'pedoman_pendataan',
    'program_pemeliharaan_motivasi',
    'pemberian_penghargaan',
    'pemberian_sanksi',
    'pengawasan_keuangan',
];
    public function desa()
     {
            return $this->belongsTo(Desa::class);
        }
}
