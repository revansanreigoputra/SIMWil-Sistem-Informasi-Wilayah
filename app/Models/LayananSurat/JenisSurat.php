<?php

namespace App\Models\LayananSurat;
use App\Models\LayananSurat\KopTemplate;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
     protected $table = 'jenis_surats';

     protected $fillable = [
          'kode',
          'nama',
          'konten_template',
          'paragraf_pembuka',
          'paragraf_penutup',
          'required_variables',
          'kop_template_id',
          'mutasi_type',
         


     ];
     protected $casts = [
        'required_variables' => 'array', 
    ];

    

    public function kopTemplate()
    { 
        return $this->belongsTo(\App\Models\LayananSurat\KopTemplate::class, 'kop_template_id'); 
    }
}
