<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HukumLkk extends Model
{
    use HasFactory;

    protected $table = 'hukum_lkks';
    protected $fillable = ['nama'];
}
