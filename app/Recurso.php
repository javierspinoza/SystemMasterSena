<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recursos';
    protected $fillable = [
        'id', 
        'nombre',
    ];
    public $timestamps=false;
}
