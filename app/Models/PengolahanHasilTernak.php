<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengolahanHasilTernak extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisUsahaPengolahanHasilTernak()
    {
        return $this->belongsTo(MasterPotensi\JenisUsahaPengolahanHasilTernak::class, 'jenis_olahan_hasil_ternak_id');
    }
}
