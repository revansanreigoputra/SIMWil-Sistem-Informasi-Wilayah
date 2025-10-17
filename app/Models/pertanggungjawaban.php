<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanggungjawaban extends Model
{
    use HasFactory;

    protected $table = 'pertanggungjawabans';

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [
        'tanggal',
        'penyampaian_laporan',
        'jumlah_informasi',
        'status_laporan',
        'laporan_kinerja',
        'jumlah_media_informasi',
        'jumlah_pengaduan_diterima',
        'jumlah_pengaduan_selesai',
    ];

    /**
     * Casting tipe data agar otomatis jadi tipe yang sesuai
     */
    protected $casts = [
        'tanggal' => 'date',
        'jumlah_informasi' => 'integer',
        'jumlah_media_informasi' => 'integer',
        'jumlah_pengaduan_diterima' => 'integer',
        'jumlah_pengaduan_selesai' => 'integer',
    ];
}
