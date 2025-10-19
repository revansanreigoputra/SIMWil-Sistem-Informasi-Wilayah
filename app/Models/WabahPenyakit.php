<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WabahPenyakit extends Model
{
    use HasFactory;

    protected $table = 'wabah_penyakit';
protected $fillable = [
    'desa_id',
    'tanggal',
    'jenis_wabah_id',
    'jumlah_kejadian_tahun_ini',
    'jumlah_meninggal',
];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function jenisWabah()
    {
        return $this->belongsTo(JenisWabah::class, 'jenis_wabah_id');
    }
    
    public function desa()
{
    return $this->belongsTo(Desa::class, 'desa_id');
}

}
