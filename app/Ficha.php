<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'fichas';
    protected $fillable = [
        'id', 
        'num_ficha',
        'nombre',
        'edo',
        'id_lider',
    ];
    public $timestamps=false;
}
