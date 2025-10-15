<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenentuanKetuaBpd extends Model
{
    use HasFactory;

    protected $table = 'penentuan_ketua_bpd';

    protected $fillable = ['nama'];
}
