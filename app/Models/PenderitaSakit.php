<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\TempatPerawatan;
use App\Models\JenisPenyakit;
use App\Models\Desa;

class PenderitaSakit extends Model
{
    use HasFactory;

    protected $table = 'penderita_sakits';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'jenis_penyakit_id',
        'jumlah_penderita',
        'tempat_perawatan_id',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisPenyakit()
    {
        return $this->belongsTo(JenisPenyakit::class, 'jenis_penyakit_id');
    }

    public function tempatPerawatan()
    {
        return $this->belongsTo(TempatPerawatan::class, 'tempat_perawatan_id');
    }
}
