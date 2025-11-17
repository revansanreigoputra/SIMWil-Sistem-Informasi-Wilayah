<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\AsetLantai;
use App\Models\Desa;

class RumahMenurutLantai extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'jenis_lantai_id',
        'tanggal',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function asetLantai()
    {
        return $this->belongsTo(AsetLantai::class, 'jenis_lantai_id');
    }
}
