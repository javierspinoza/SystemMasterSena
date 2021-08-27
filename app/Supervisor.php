<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'supervisor';
    protected $fillable = [
        'id', 
        'num_doc',
        'nombre',
        'apellido',
        'email',
        'grado',
        'estado',
    ];
    public $timestamps=false;
}
