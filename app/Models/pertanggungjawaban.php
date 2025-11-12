<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanggungjawaban extends Model
{
    use HasFactory;

    protected $table = 'pertanggungjawabans';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'penyampaian_laporan',
        'jumlah_informasi',
        'status_laporan',
        'laporan_kinerja',
        'jumlah_media_informasi',
        'jumlah_pengaduan_diterima',
        'jumlah_pengaduan_selesai',
    ];

    protected $casts = [
        'desa_id',
        'tanggal' => 'date',
        'penyampaian_laporan',
        'status_laporan',
        'laporan_kinerja',
        'jumlah_informasi' => 'integer',
        'jumlah_media_informasi' => 'integer',
        'jumlah_pengaduan_diterima' => 'integer',
        'jumlah_pengaduan_selesai' => 'integer',
    ];
    //Relasi ke Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
