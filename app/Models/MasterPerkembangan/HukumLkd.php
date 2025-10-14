<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HukumLkd extends Model
{
    use HasFactory;

    protected $table = 'hukum_lkds';
    protected $fillable = ['nama'];
}
