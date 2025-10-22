<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKepemilikan extends Model
{
    use HasFactory;

    protected $table = 'status_kepemilikan';

    protected $fillable = ['nama'];
}
