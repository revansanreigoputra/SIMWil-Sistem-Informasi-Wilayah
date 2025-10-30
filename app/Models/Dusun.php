<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $fillable = [
        'desa_id',
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

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}