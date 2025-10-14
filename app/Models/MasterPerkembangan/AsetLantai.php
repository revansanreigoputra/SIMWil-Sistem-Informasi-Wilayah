<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetLantai extends Model
{
    use HasFactory;

    protected $table = 'aset_lantais'; 
    protected $fillable = ['nama'];   
}
