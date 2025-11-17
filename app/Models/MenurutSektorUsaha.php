<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\KomoditasSektor;

class MenurutSektorUsaha extends Model
{
    use HasFactory;

    // ✔ Nama tabel sesuai migration
    protected $table = 'menurut_sektor_usahas';

    protected $fillable = [
        'id_desa',
        'sektor_id',
        'tanggal',
        'kk',
        'anggota',
        'buruh',
        'anggota_buruh',
        'pendapatan',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function sektor()
    {
        return $this->belongsTo(KomoditasSektor::class, 'sektor_id');
    }
}
