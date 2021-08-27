<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = 'pension';
    protected $fillable = [
        'id', 
        'nombre',
    ];
    public $timestamps=false;
}
