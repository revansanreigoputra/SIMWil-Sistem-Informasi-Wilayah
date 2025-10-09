<?php

namespace App\Models\LayananSurat;
use App\Models\LayananSurat\JenisSurat;
use Illuminate\Database\Eloquent\Model;

class KopTemplate extends Model
{
    protected $table = 'kop_templates';

    protected $fillable = [
        'jenis_kop',
        'nama',
        'logo',
    ];
    public function jenisSurats() 
{ 
    return $this->hasMany(JenisSurat::class, 'kop_template_id'); 
}
}
