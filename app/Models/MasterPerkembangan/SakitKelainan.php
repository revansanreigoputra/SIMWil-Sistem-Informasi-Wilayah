<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SakitKelainan extends Model
{
    use HasFactory;

    protected $table = 'sakit_kelainan';

    protected $fillable = ['nama'];
}
