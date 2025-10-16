<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusLkd extends Model
{
    use HasFactory;

    protected $table = 'pengurus_lkd';

    protected $fillable = ['nama'];
}
