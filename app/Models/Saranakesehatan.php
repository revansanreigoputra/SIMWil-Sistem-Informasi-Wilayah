<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisSaranaKesehatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saranakesehatan extends Model
{
    use HasFactory;

    protected $table = 'saranakesehatans';
    protected $fillable = [
        'desa_id',
        'tanggal',
        'jenis_sarana_kesehatan_id',
        'jumlah',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke Jenis Sarana Kesehatan
     */
    public function jenisSaranaKesehatan()
    {
        return $this->belongsTo(JenisSaranaKesehatan::class, 'jenis_sarana_kesehatan_id');
    }

    /**
     * Relasi ke Desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}