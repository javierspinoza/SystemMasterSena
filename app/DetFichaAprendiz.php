<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetFichaAprendiz extends Model
{
    protected $table = 'det_ficha_aprendiz';
    protected $fillable = [
        'id', 
        'id_ficha',
        'id_aprendiz',
        'fec_save',
    ];
    public $timestamps=false;
}
