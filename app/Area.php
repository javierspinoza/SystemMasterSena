<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $fillable = [
        'id', 
        'nombres',
    ];
    public $timestamps=false;
}
