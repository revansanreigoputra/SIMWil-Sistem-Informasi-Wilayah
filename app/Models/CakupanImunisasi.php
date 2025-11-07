<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakupanImunisasi extends Model
{
    use HasFactory;

    protected $table = 'cakupan_imunisasis';

    protected $fillable = [
    'desa_id',
    'tanggal',
    'bayi_usia_2_bulan',
    'bayi_2_bulan_dpt1_bcg_polio1',
    'bayi_usia_3_bulan',
    'bayi_3_bulan_dpt2_polio2',
    'bayi_usia_4_bulan',
    'bayi_4_bulan_dpt3_polio3',
    'bayi_usia_9_bulan',
    'bayi_9_bulan_campak',
    'bayi_imunisasi_cacar',
];

public function desa()
{
    return $this->belongsTo(Desa::class);
}

}
