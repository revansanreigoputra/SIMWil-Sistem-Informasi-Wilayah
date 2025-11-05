<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterDDK\MataPencaharian;

class SektorJasaUsaha extends Model
{
    use HasFactory;

    // Nama tabel disesuaikan
    protected $table = 'sektor_jasa_usahas';

    // Field yang boleh diisi (fillable)
    protected $fillable = [
        'desa_id',
        'mata_pencaharian_id',
        'tanggal',
        'jumlah',
    ];

    // Relasi ke model Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    // Relasi ke model MataPencaharian (disamakan dengan relasi sektor industri besar)
    public function mataPencaharian()
    {
        return $this->belongsTo(MataPencaharian::class, 'mata_pencaharian_id');
    }
}