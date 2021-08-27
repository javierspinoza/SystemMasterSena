<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salud extends Model
{
    protected $table = 'salud';
    protected $fillable = [
        'id', 
        'nombre',
    ];
    public $timestamps=false;
}
