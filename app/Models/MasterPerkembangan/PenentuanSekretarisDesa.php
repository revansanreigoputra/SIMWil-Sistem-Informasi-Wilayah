<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenentuanSekretarisDesa extends Model
{
    use HasFactory;

    protected $table = 'penentuan_sekretaris_desa';

    protected $fillable = ['nama'];
}
