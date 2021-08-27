<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $fillable = [
        'id', 'id_contratista', 'numero', 'fecha', 'objeto', 'educacion', 'obligacion', 'experiencia',
        'vr_inicial', 'vr_hora_mes', 'plazo_inicial', 'tp_contrato', 'horas', 'tot_horas', 'nro_autoriza',
        'fec_autoriza', 'id_lugar', 'tp_riesgo', 'siif', 'fec_siif', 'id_supervisa', 'nro_poliza',
        'vr_asegurado', 'porc_asegura', 'vigencia1', 'vigencia2', 'nro_aprobacion', 'fec_poliza',
        'id_arl', 'vr_cdp', 'fec_ini_pol', 'fec_fin_pol', 'link', 'id_recurso', 'nro_cdp'
    ];
    public $timestamps=false;
}