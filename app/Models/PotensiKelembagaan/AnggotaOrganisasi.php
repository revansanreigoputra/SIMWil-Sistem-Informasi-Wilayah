<?php

namespace App\Models\PotensiKelembagaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PerangkatDesa;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;

class AnggotaOrganisasi extends Model
{
    protected $table = 'anggota_organisasis';

    protected $fillable = [
        'perangkat_desa_id',
        'jabatan_id',
        'status_jabatan',
        'keterangan_tambahan',
    ];

    public function perangkatDesa()
    {
        return $this->belongsTo(\App\Models\PerangkatDesa::class, 'perangkat_desa_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(\App\Models\Jabatan::class, 'jabatan_id');
    }

}
