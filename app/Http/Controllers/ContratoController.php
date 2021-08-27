<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Contratista;
use App\Supervisor;
use App\Arl;
use App\Recurso;
use App\Dpto;
use App\Mpio;

class ContratoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

            $contratos = Contrato::join('contratistas','contratos.id_contratista','=','contratistas.id')
            ->join('supervisor','contratos.id_supervisa','=','supervisor.id')
            ->join('arl','contratos.id_arl','=','arl.id')
            ->join('recursos','contratos.id_recurso','=','recursos.id')
            ->join('mpios','contratos.id_lugar','=','mpios.id')
            ->join('dptos','mpios.id_dpto','=','dptos.id')
            // 'mpios.id as idMpios','mpios.nombre as nomMpio','dptos.id as idDpto','dptos.nombre as nomDpto',
            ->select('mpios.id as idMpios','mpios.nombre as nomMpio', 'dptos.id as idDpto','dptos.nombre as nomDpto',
            'contratos.id', 'contratos.numero', 'contratos.fecha', 'contratos.objeto', 'contratos.educacion',
            'contratos.obligacion', 'contratos.experiencia', 'contratos.vr_inicial', 'contratos.vr_hora_mes',
            'contratos.plazo_inicial', 'contratos.tp_contrato', 'contratos.horas', 'contratos.tot_horas',
            'contratos.nro_cdp', 'contratos.nro_autoriza', 'contratos.fec_autoriza', 'contratos.tp_riesgo',
            'contratos.siif', 'contratos.fec_siif', 'contratos.nro_poliza', 'contratos.vr_asegurado', 
            'contratos.porc_asegura', 'contratos.vigencia1', 'contratos.vigencia2', 'contratos.nro_aprobacion',
            'contratos.fec_poliza', 'contratos.vr_cdp', 'contratos.fec_ini_pol', 'contratos.fec_fin_pol',
            'contratos.link', 'contratos.id_contratista', 'contratos.id_supervisa', 'contratos.id_arl', 
            'contratos.id_recurso', 'contratos.id_lugar',//lugar es el mismo mpio para el multiselect
            'contratistas.nomFull', 'supervisor.nomFull as nomSupervisor', 
            'arl.nombre as nomArl', 'recursos.nombre as nomRecursos')
            ->paginate(9999999999999999999999999);
        
        return [
            'contratos' => $contratos
        ];
    }

    // public function selectBanco(Request $request)
    // {
    //     $bancos = Banco::select('id','nombre')
    //         ->orderBy('nombre', 'asc')->get();
    //     return [
    //         'bancos' => $bancos
    //     ];
    // }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $contratos = new Contrato();
        $contratos->id_contratista = $request->id_contratista;
        $contratos->numero = $request->numero;
        $contratos->fecha = $request->fecha;
        $contratos->objeto = $request->objeto;
        $contratos->educacion = $request->educacion;
        $contratos->obligacion = $request->obligacion;
        $contratos->experiencia = $request->experiencia;
        $contratos->vr_inicial = $request->vr_inicial;
        $contratos->vr_hora_mes = $request->vr_hora_mes;
        $contratos->plazo_inicial = $request->plazo_inicial;
        $contratos->tp_contrato = $request->tp_contrato;
        $contratos->horas = $request->horas;
        $contratos->tot_horas = $request->tot_horas;
        $contratos->nro_cdp = $request->nro_cdp;
        $contratos->nro_autoriza = $request->nro_autoriza;
        $contratos->fec_autoriza = $request->fec_autoriza;
        $contratos->id_lugar = $request->id_lugar;
        $contratos->tp_riesgo = $request->tp_riesgo;
        $contratos->siif = $request->siif;
        $contratos->fec_siif = $request->fec_siif;
        $contratos->id_supervisa = $request->id_supervisa;
        $contratos->nro_poliza = $request->nro_poliza;
        $contratos->vr_asegurado = $request->vr_asegurado;
        $contratos->porc_asegura = $request->porc_asegura;
        $contratos->vigencia1 = $request->vigencia1;
        $contratos->vigencia2 = $request->vigencia2;
        $contratos->nro_aprobacion = $request->nro_aprobacion;
        $contratos->fec_poliza = $request->fec_poliza;
        $contratos->id_arl = $request->id_arl;
        $contratos->vr_cdp = $request->vr_cdp;
        $contratos->fec_ini_pol = $request->fec_ini_pol;
        $contratos->fec_fin_pol = $request->fec_fin_pol;
        $contratos->link = $request->link;
        $contratos->id_recurso = $request->id_recurso;
        $contratos->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $contratos = Contrato::findOrFail($request->id);
        $contratos->id_contratista = $request->id_contratista;
        $contratos->numero = $request->numero;
        $contratos->fecha = $request->fecha;
        $contratos->objeto = $request->objeto;
        $contratos->educacion = $request->educacion;
        $contratos->obligacion = $request->obligacion;
        $contratos->experiencia = $request->experiencia;
        $contratos->vr_inicial = $request->vr_inicial;
        $contratos->vr_hora_mes = $request->vr_hora_mes;
        $contratos->plazo_inicial = $request->plazo_inicial;
        $contratos->tp_contrato = $request->tp_contrato;
        $contratos->horas = $request->horas;
        $contratos->tot_horas = $request->tot_horas;
        $contratos->nro_cdp = $request->nro_cdp;
        $contratos->nro_autoriza = $request->nro_autoriza;
        $contratos->fec_autoriza = $request->fec_autoriza;
        $contratos->id_lugar = $request->id_lugar;
        $contratos->tp_riesgo = $request->tp_riesgo;
        $contratos->siif = $request->siif;
        $contratos->fec_siif = $request->fec_siif;
        $contratos->id_supervisa = $request->id_supervisa;
        $contratos->nro_poliza = $request->nro_poliza;
        $contratos->vr_asegurado = $request->vr_asegurado;
        $contratos->porc_asegura = $request->porc_asegura;
        $contratos->vigencia1 = $request->vigencia1;
        $contratos->vigencia2 = $request->vigencia2;
        $contratos->nro_aprobacion = $request->nro_aprobacion;
        $contratos->fec_poliza = $request->fec_poliza;
        $contratos->id_arl = $request->id_arl;
        $contratos->vr_cdp = $request->vr_cdp;
        $contratos->fec_ini_pol = $request->fec_ini_pol;
        $contratos->fec_fin_pol = $request->fec_fin_pol;
        $contratos->link = $request->link;
        $contratos->id_recurso = $request->id_recurso;
        $contratos->save();
    }


    public function destroy(Request $request)
    {
        $contratos= Contrato::findOrfail($request->id);
        $contratos->delete();
    }
}
