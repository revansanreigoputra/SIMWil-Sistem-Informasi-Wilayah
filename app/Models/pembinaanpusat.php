<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembinaanPusat extends Model
{
    use HasFactory;

    protected $table = 'pembinaanpusats';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'pedoman_pelaksanaan_urusan',
        'pedoman_bantuan_pembiayaan',
        'pedoman_administrasi',
        'pedoman_tanda_jabatan',
        'pedoman_pendidikan_pelatihan',
        'jumlah_bimbingan',
        'jumlah_kegiatan_pendidikan',
        'jumlah_penelitian_pengkajian',
        'jumlah_kegiatan_terkait_apbn',
        'jumlah_penghargaan',
        'jumlah_sanksi',
    ];

    // Jika ingin cast otomatis ke date
    protected $casts = [
        'desa_id',
        'tanggal' => 'date',
        'pedoman_pelaksanaan_urusan',
        'pedoman_bantuan_pembiayaan',
        'pedoman_administrasi',
        'pedoman_tanda_jabatan',
        'pedoman_pendidikan_pelatihan',
        'jumlah_bimbingan',
        'jumlah_kegiatan_pendidikan',
        'jumlah_penelitian_pengkajian',
        'jumlah_kegiatan_terkait_apbn',
        'jumlah_penghargaan',
        'jumlah_sanksi',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
