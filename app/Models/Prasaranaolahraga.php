<?php

namespace App\Models;

use App\Models\MasterPotensi\JenisPrasaranaOlahRaga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasaranaolahraga extends Model
{
    use HasFactory;

    protected $table = 'prasaranaolahragas';
    protected $fillable = [
        'tanggal',
        'jenis_prasarana_olah_raga_id',
        'jumlah',
        'desa_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke jenis prasarana olahraga
     * Setiap prasarana olahraga dimiliki oleh satu jenis prasarana
     */
    public function jenisPrasaranaOlahRaga()
    {
        return $this->belongsTo(JenisPrasaranaOlahRaga::class, 'jenis_prasarana_olah_raga_id');
    }

    /**
     * Relasi ke desa
     * Setiap prasarana olahraga dimiliki oleh satu desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}