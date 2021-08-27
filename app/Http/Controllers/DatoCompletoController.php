<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datocompleto;
use App\Salud;
use App\Banco;
use App\Arl;
use App\Area;
use App\Pension;
use App\Supervisor;
use App\Dpto;
use App\Mpio;

class DatoCompletoController extends Controller
{
    public function index(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');

            $datocompletos = Datocompleto::join('salud','datospersona.id_salud','=','salud.id')
            ->join('banco','datospersona.id_banco','=','banco.id')
            ->join('arl','datospersona.id_arl','=','arl.id')
            ->join('area','datospersona.id_area','=','area.id')
            ->join('pension','datospersona.id_pension','=','pension.id')
            ->join('supervisor','datospersona.id_supervisor','=','supervisor.id')
            ->join('mpios','datospersona.lugar_expe','=','mpios.id')
            ->join('dptos','mpios.id_dpto','=','dptos.id')
            ->select('mpios.id as idMpios','mpios.nombre as nomMpio', 'dptos.id as idDpto','dptos.nombre as nomDpto',
            'datospersona.id', 'datospersona.id_area', 'datospersona.id_arl', 'datospersona.id_banco', 
            'datospersona.id_pension', 'datospersona.id_salud','datospersona.num', 
            'datospersona.num_proceso', 'datospersona.nombre', 'datospersona.apellido', 'datospersona.cc', 
            'datospersona.tp_doc', 'datospersona.lugar_expe', 'datospersona.num_contrato', 'datospersona.fec_contrato', 
            'datospersona.obj_contractual', 'datospersona.educacion', 'datospersona.obligaciones', 'datospersona.exp_relacionada', 
            'datospersona.vlr_ini_contrato', 'datospersona.vlr_hra_mensual', 'datospersona.vlr_adicion', 
            'datospersona.fec_adicion', 'datospersona.vlr_pagado', 'datospersona.plazo_inicial', 'datospersona.plazo_adicion', 
            'datospersona.plazo_eje_total', 'datospersona.horas', 'datospersona.adicion_horas', 'datospersona.total_horas', 
            'datospersona.reversion', 'datospersona.fec_reversion', 'datospersona.celular', 'datospersona.tp_cuenta', 
            'datospersona.num_cuenta', 'datospersona.email', 'datospersona.direccion', 'datospersona.num_cdp', 
            'datospersona.fec_nacimiento', 'datospersona.num_autorizacion', 'datospersona.fec_autorizacion', 
            'datospersona.lugar_ejecucion', 'datospersona.fec_inicio_secop', 'datospersona.fec_fin_secop', 
            'datospersona.compromiso_siif', 'datospersona.fec_compromiso', 'datospersona.id_supervisor', 
            'datospersona.num_cc_sup', 'datospersona.lug_exp_sup', 'datospersona.email_sup', 'datospersona.cargo_sup', 
            'datospersona.num_poliza', 'datospersona.vlr_asegurado', 'datospersona.por_asegurado', 
            'datospersona.vigencia1_cumpli', 'datospersona.vigencia2_cumpli', 'datospersona.apro_poliza', 
            'datospersona.fec_exp_poliza', 'datospersona.comp_aseguradora', 'datospersona.nit_comp', 
            'datospersona.vlr_cdp', 'datospersona.fec_ini_cobertura', 'datospersona.fec_fin_cobertura', 'datospersona.link_contrato',
            'salud.nombre as nombreSalud', 'banco.nombre as nombreBanco', 'arl.nombre as nombreArl', 
            'area.nombres as nombreArea', 'pension.nombre as nombrePension', 'supervisor.nomFull as nomSupervisor')
            ->paginate(9999999999999999999999999);
        
        return [
            'datocompletos' => $datocompletos
        ];
    }

    public function store(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');
        
        $datocompletos = new Datocompleto();
        $datocompletos->id_area = $request->id_area;
        $datocompletos->id_arl  = $request->id_arl ;
        $datocompletos->id_banco  = $request->id_banco ;
        $datocompletos->id_pension  = $request->id_pension ;
        $datocompletos->id_salud  = $request->id_salud ;
        $datocompletos->id_supervisor  = $request->id_supervisor ;
        $datocompletos->num  = $request->num ;
        $datocompletos->num_proceso  = $request->num_proceso ;
        $datocompletos->nombre  = $request->nombre ;
        $datocompletos->apellido  = $request->apellido ;
        $datocompletos->tp_doc  = $request->tp_doc ;
        $datocompletos->cc  = $request->cc ;
        $datocompletos->lugar_expe  = $request->lugar_expe ;
        $datocompletos->num_contrato  = $request->num_contrato ;
        $datocompletos->fec_contrato  = $request->fec_contrato ;
        $datocompletos->obj_contractual  = $request->obj_contractual ;
        $datocompletos->educacion  = $request->educacion ;
        $datocompletos->obligaciones  = $request->obligaciones ;
        $datocompletos->exp_relacionada  = $request->exp_relacionada ;
        $datocompletos->vlr_ini_contrato  = $request->vlr_ini_contrato ;
        $datocompletos->vlr_hra_mensual  = $request->vlr_hra_mensual ;
        $datocompletos->vlr_adicion  = $request->vlr_adicion ;
        $datocompletos->fec_adicion  = $request->fec_adicion ;
        $datocompletos->vlr_pagado  = $request->vlr_pagado ;
        $datocompletos->plazo_inicial  = $request->plazo_inicial ;
        $datocompletos->plazo_adicion  = $request->plazo_adicion ;
        $datocompletos->plazo_eje_total  = $request->plazo_eje_total ;
        $datocompletos->horas  = $request->horas ;
        $datocompletos->adicion_horas  = $request->adicion_horas ;
        $datocompletos->total_horas  = $request->total_horas ;
        $datocompletos->reversion  = $request->reversion ;
        $datocompletos->fec_reversion  = $request->fec_reversion ;
        $datocompletos->celular  = $request->celular ;
        $datocompletos->tp_cuenta  = $request->tp_cuenta ;
        $datocompletos->num_cuenta  = $request->num_cuenta ;
        $datocompletos->email  = $request->email ;
        $datocompletos->direccion  = $request->direccion ;
        $datocompletos->num_cdp  = $request->num_cdp ;
        $datocompletos->fec_nacimiento  = $request->fec_nacimiento ;
        $datocompletos->num_autorizacion  = $request->num_autorizacion ;
        $datocompletos->fec_autorizacion  = $request->fec_autorizacion ;
        $datocompletos->lugar_ejecucion  = $request->lugar_ejecucion ;
        $datocompletos->fec_inicio_secop  = $request->fec_inicio_secop ;
        $datocompletos->fec_fin_secop  = $request->fec_fin_secop ;
        $datocompletos->compromiso_siif  = $request->compromiso_siif ;
        $datocompletos->fec_compromiso  = $request->fec_compromiso ;
        $datocompletos->num_cc_sup  = $request->num_cc_sup ;
        $datocompletos->lug_exp_sup  = $request->lug_exp_sup ;
        $datocompletos->email_sup  = $request->email_sup ;
        $datocompletos->cargo_sup  = $request->cargo_sup ;
        $datocompletos->num_poliza  = $request->num_poliza ;
        $datocompletos->vlr_asegurado  = $request->vlr_asegurado ;
        $datocompletos->por_asegurado  = $request->por_asegurado ;
        $datocompletos->vigencia1_cumpli  = $request->vigencia1_cumpli ;
        $datocompletos->vigencia2_cumpli  = $request->vigencia2_cumpli ;
        $datocompletos->apro_poliza  = $request->apro_poliza ;
        $datocompletos->fec_exp_poliza  = $request->fec_exp_poliza ;
        $datocompletos->comp_aseguradora  = $request->comp_aseguradora ;
        $datocompletos->nit_comp  = $request->nit_comp ;
        $datocompletos->vlr_cdp  = $request->vlr_cdp ;
        $datocompletos->fec_ini_cobertura  = $request->fec_ini_cobertura ;
        $datocompletos->fec_fin_cobertura  = $request->fec_fin_cobertura ;
        $datocompletos->link_contrato = $request->link_contrato;
        $datocompletos->save();
    }

    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');

        $datocompletos = Datocompleto::findOrFail($request->id);
        $datocompletos->id_area = $request->id_area;
        $datocompletos->id_arl  = $request->id_arl ;
        $datocompletos->id_banco  = $request->id_banco ;
        $datocompletos->id_pension  = $request->id_pension ;
        $datocompletos->id_salud  = $request->id_salud ;
        $datocompletos->id_supervisor  = $request->id_supervisor ;
        $datocompletos->num  = $request->num ;
        $datocompletos->num_proceso  = $request->num_proceso ;
        $datocompletos->nombre  = $request->nombre ;
        $datocompletos->apellido  = $request->apellido ;
        $datocompletos->tp_doc  = $request->tp_doc ;
        $datocompletos->cc  = $request->cc ;
        $datocompletos->lugar_expe  = $request->lugar_expe ;
        $datocompletos->num_contrato  = $request->num_contrato ;
        $datocompletos->fec_contrato  = $request->fec_contrato ;
        $datocompletos->obj_contractual  = $request->obj_contractual ;
        $datocompletos->educacion  = $request->educacion ;
        $datocompletos->obligaciones  = $request->obligaciones ;
        $datocompletos->exp_relacionada  = $request->exp_relacionada ;
        $datocompletos->vlr_ini_contrato  = $request->vlr_ini_contrato ;
        $datocompletos->vlr_hra_mensual  = $request->vlr_hra_mensual ;
        $datocompletos->vlr_adicion  = $request->vlr_adicion ;
        $datocompletos->fec_adicion  = $request->fec_adicion ;
        $datocompletos->vlr_pagado  = $request->vlr_pagado ;
        $datocompletos->plazo_inicial  = $request->plazo_inicial ;
        $datocompletos->plazo_adicion  = $request->plazo_adicion ;
        $datocompletos->plazo_eje_total  = $request->plazo_eje_total ;
        $datocompletos->horas  = $request->horas ;
        $datocompletos->adicion_horas  = $request->adicion_horas ;
        $datocompletos->total_horas  = $request->total_horas ;
        $datocompletos->reversion  = $request->reversion ;
        $datocompletos->fec_reversion  = $request->fec_reversion ;
        $datocompletos->celular  = $request->celular ;
        $datocompletos->tp_cuenta  = $request->tp_cuenta ;
        $datocompletos->num_cuenta  = $request->num_cuenta ;
        $datocompletos->email  = $request->email ;
        $datocompletos->direccion  = $request->direccion ;
        $datocompletos->num_cdp  = $request->num_cdp ;
        $datocompletos->fec_nacimiento  = $request->fec_nacimiento ;
        $datocompletos->num_autorizacion  = $request->num_autorizacion ;
        $datocompletos->fec_autorizacion  = $request->fec_autorizacion ;
        $datocompletos->lugar_ejecucion  = $request->lugar_ejecucion ;
        $datocompletos->fec_inicio_secop  = $request->fec_inicio_secop ;
        $datocompletos->fec_fin_secop  = $request->fec_fin_secop ;
        $datocompletos->compromiso_siif  = $request->compromiso_siif ;
        $datocompletos->fec_compromiso  = $request->fec_compromiso ;
        $datocompletos->num_cc_sup  = $request->num_cc_sup ;
        $datocompletos->lug_exp_sup  = $request->lug_exp_sup ;
        $datocompletos->email_sup  = $request->email_sup ;
        $datocompletos->cargo_sup  = $request->cargo_sup ;
        $datocompletos->num_poliza  = $request->num_poliza ;
        $datocompletos->vlr_asegurado  = $request->vlr_asegurado ;
        $datocompletos->por_asegurado  = $request->por_asegurado ;
        $datocompletos->vigencia1_cumpli  = $request->vigencia1_cumpli ;
        $datocompletos->vigencia2_cumpli  = $request->vigencia2_cumpli ;
        $datocompletos->apro_poliza  = $request->apro_poliza ;
        $datocompletos->fec_exp_poliza  = $request->fec_exp_poliza ;
        $datocompletos->comp_aseguradora  = $request->comp_aseguradora ;
        $datocompletos->nit_comp  = $request->nit_comp ;
        $datocompletos->vlr_cdp  = $request->vlr_cdp ;
        $datocompletos->fec_ini_cobertura  = $request->fec_ini_cobertura ;
        $datocompletos->fec_fin_cobertura  = $request->fec_fin_cobertura ;
        $datocompletos->link_contrato = $request->link_contrato;
        $datocompletos->save();
    }

    public function destroy(Request $request)
    {
        $datocompletos= Datocompleto::findOrfail($request->id);
        $datocompletos->delete();
    }
}