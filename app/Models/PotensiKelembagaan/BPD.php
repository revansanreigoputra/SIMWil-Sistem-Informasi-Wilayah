<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;

class BPD extends Model
{
    protected $table = 'bpds';

    protected $fillable = [
        'keberadaan_bpd',
        'jumlah_anggota',
    ];  
    
}
