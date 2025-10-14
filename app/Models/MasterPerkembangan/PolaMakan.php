<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaMakan extends Model
{
    use HasFactory;

    protected $table = 'pola_makan';

    protected $fillable = ['nama'];
}
