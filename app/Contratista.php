<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    protected $table = 'contratistas';
    protected $fillable = [
        'id', 'nombres', 'apellidos', 'num_doc', 'id_mpio', 'telefono', 'tp_cuenta', 'num_cuenta', 'email', 'direccion',
        'fec_nac', 'id_eps', 'id_pension', 'id_riesgos', 'id_banco', 'id_area', 'nomFull', 'is_rol', 'tp_doc'
    ];
    public $timestamps=false;
}
