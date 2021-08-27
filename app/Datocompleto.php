<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datocompleto extends Model
{
    protected $table = 'datospersona';
    protected $fillable = [
        'id', 'id_area', 'id_arl', 'id_banco', 'id_pension', 'id_salud', 'id_supervisor', 'num', 'num_proceso', 'nombre', 
        'apellido', 'tp_doc', 'cc', 'lugar_expe', 'num_contrato', 'fec_contrato', 'obj_contractual', 'educacion', 
        'obligaciones', 'exp_relacionada', 'vlr_ini_contrato', 'vlr_hra_mensual', 'vlr_adicion', 'fec_adicion', 
        'vlr_pagado', 'plazo_inicial', 'plazo_adicion', 'plazo_eje_total', 'horas', 'adicion_horas', 
        'total_horas', 'reversion', 'fec_reversion', 'celular', 'tp_cuenta', 'num_cuenta', 'email', 
        'direccion', 'num_cdp', 'fec_nacimiento', 'num_autorizacion', 'fec_autorizacion', 'lugar_ejecucion', 
        'fec_inicio_secop', 'fec_fin_secop', 'compromiso_siif', 'fec_compromiso', 'num_cc_sup', 
        'lug_exp_sup', 'email_sup', 'cargo_sup', 'num_poliza', 'vlr_asegurado', 'por_asegurado', 
        'vigencia1_cumpli', 'vigencia2_cumpli', 'apro_poliza', 'fec_exp_poliza', 'comp_aseguradora', 
        'nit_comp', 'vlr_cdp', 'fec_ini_cobertura', 'fec_fin_cobertura', 'link_contrato',
        
    ];
    public $timestamps=false;
}
