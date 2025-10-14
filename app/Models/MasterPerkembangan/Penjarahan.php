<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjarahan extends Model
{
    use HasFactory;

    protected $table = 'penjarahan';

    protected $fillable = ['nama'];
}
