<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pembinaanprovinsi extends Model
{
    use HasFactory;

    protected $table = 'pembinaanprovinsis';

    protected $fillable = [
        'tanggal',
        'pedoman_pelaksanaan_tugas',
        'pedoman_bantuan_keuangan',
        'kegiatan_fasilitasi_keberadaan',
        'fasilitasi_pelaksanaan_pedoman',
        'jumlah_kegiatan_pendidikan',
        'kegiatan_penanggulangan_kemiskinan',
        'kegiatan_penanganan_bencana',
        'kegiatan_peningkatan_pendapatan',
        'kegiatan_penyediaan_sarana',
        'kegiatan_pemanfaatan_sda',
        'kegiatan_pengembangan_sosial',
        'pedoman_pendataan',
        'pemberian_sanksi',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah_kegiatan_pendidikan' => 'integer',
        'kegiatan_penanggulangan_kemiskinan' => 'integer',
        'kegiatan_penanganan_bencana' => 'integer',
        'kegiatan_peningkatan_pendapatan' => 'integer',
        'kegiatan_penyediaan_sarana' => 'integer',
        'kegiatan_pemanfaatan_sda' => 'integer',
        'kegiatan_pengembangan_sosial' => 'integer',
        'pedoman_pendataan' => 'integer',
        'pemberian_sanksi' => 'integer',
    ];
}
