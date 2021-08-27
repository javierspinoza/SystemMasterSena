<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    protected $table = 'arl';
    protected $fillable = [
        'id', 
        'nombre',
    ];
    // public $timestamps=false;
}
