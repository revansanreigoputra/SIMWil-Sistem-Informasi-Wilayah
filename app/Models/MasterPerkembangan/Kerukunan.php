<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerukunan extends Model
{
    use HasFactory;

    protected $table = 'kerukunans';

    protected $fillable = ['nama'];
}
