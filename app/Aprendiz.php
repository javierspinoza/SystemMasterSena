<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    protected $table = 'aprendices';
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'email', 'telefono', 'edo'
    ];
    public $timestamps=false;
}
