<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisHutan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiHutan extends Model
{
    use HasFactory;

    protected $table = 'kondisi_hutans';

    protected $fillable = [
        'tanggal',
        'desa_id',
        'jenis_hutan_id',
        'kondisi_baik',
        'kondisi_buruk',
        'jumlah_luas_hutan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisHutan()
    {
        return $this->belongsTo(JenisHutan::class, 'jenis_hutan_id');
    }
}