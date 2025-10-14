<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatPerawatan extends Model
{
    use HasFactory;

    protected $table = 'tempat_perawatan';

    protected $fillable = ['nama'];
}
