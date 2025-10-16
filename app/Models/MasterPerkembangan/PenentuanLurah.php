<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenentuanLurah extends Model
{
    use HasFactory;

    protected $table = 'penentuan_lurah';

    protected $fillable = ['nama'];
}
