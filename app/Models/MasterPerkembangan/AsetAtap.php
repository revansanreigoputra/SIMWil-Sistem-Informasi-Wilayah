<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetAtap extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis tahu dari nama model)
    protected $table = 'aset_ataps';

    // Kolom yang boleh diisi secara mass-assignment
    protected $fillable = [
        'nama',
    ];
}
