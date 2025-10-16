<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusLkk extends Model
{
    use HasFactory;

    protected $table = 'pengurus_lkk';

    protected $fillable = ['nama'];
}
