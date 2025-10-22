<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usia extends Model
{
    use HasFactory;

    protected $table = 'usias'; // nama tabel sesuai migration
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        // laki-laki 0 - 75
        'l0','l1','l2','l3','l4','l5','l6','l7','l8','l9','l10',
        'l11','l12','l13','l14','l15','l16','l17','l18','l19','l20',
        'l21','l22','l23','l24','l25','l26','l27','l28','l29','l30',
        'l31','l32','l33','l34','l35','l36','l37','l38','l39','l40',
        'l41','l42','l43','l44','l45','l46','l47','l48','l49','l50',
        'l51','l52','l53','l54','l55','l56','l57','l58','l59','l60',
        'l61','l62','l63','l64','l65','l66','l67','l68','l69','l70',
        'l71','l72','l73','l74','l75',

        // perempuan 0 - 75
        'p0','p1','p2','p3','p4','p5','p6','p7','p8','p9','p10',
        'p11','p12','p13','p14','p15','p16','p17','p18','p19','p20',
        'p21','p22','p23','p24','p25','p26','p27','p28','p29','p30',
        'p31','p32','p33','p34','p35','p36','p37','p38','p39','p40',
        'p41','p42','p43','p44','p45','p46','p47','p48','p49','p50',
        'p51','p52','p53','p54','p55','p56','p57','p58','p59','p60',
        'p61','p62','p63','p64','p65','p66','p67','p68','p69','p70',
        'p71','p72','p73','p74','p75',
        'desa_id',
    ];
}
