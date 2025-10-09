<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KualitasBayi extends Model
{
    use HasFactory;
        protected $table = 'kualitas_bayi'; 

    protected $fillable = [
        'tanggal',
        'jumlah_keguguran',
        'jumlah_bayi_lahir',
        'jumlah_bayi_lahir_hidup',
        'jumlah_bayi_lahir_mati',
        'jumlah_bayi_berat_kurang_25',
        'jumlah_bayi_cacat',
    ];
}
