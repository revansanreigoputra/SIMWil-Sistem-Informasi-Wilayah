<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $fillable = [
        'tanggal',
        'gedung_kantor',
        'alat_tulis_kantor',
        'barang_inventaris',
        'buku_administrasi',
        'jenis_kegiatan',
        'jumlah_pengurus',
        'lainnya',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}