<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MasterPotensi\JenisDampak;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DampakPengolahanHutan extends Model
{
    use HasFactory;

    protected $table = 'dampak_pengolahan_hutans';

    protected $fillable = [
        'tanggal',
        'desa_id',
        'jenis_dampak_id',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisDampak()
    {
        return $this->belongsTo(JenisDampak::class);
    }
}