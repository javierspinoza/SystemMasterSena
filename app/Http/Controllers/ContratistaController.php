<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contratista;
use App\Area;
use App\Arl;
use App\Banco;
use App\Pension;
use App\Salud;
use App\Dpto;
use App\Mpio;

class ContratistaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

            $contratistas = Contratista::join('salud','contratistas.id_eps','=','salud.id')
            ->join('banco','contratistas.id_banco','=','banco.id')
            ->join('arl','contratistas.id_riesgos','=','arl.id')
            ->join('pension','contratistas.id_pension','=','pension.id')
            ->join('area','contratistas.id_area','=','area.id')
            ->join('mpios','contratistas.id_mpio','=','mpios.id')
            ->join('dptos','mpios.id_dpto','=','dptos.id')
            // 'mpios.id as idMpios','mpios.nombre as nomMpio','dptos.id as idDpto','dptos.nombre as nomDpto',
            ->select('mpios.id as idMpios','mpios.nombre as nomMpio', 'dptos.id as idDpto','dptos.nombre as nomDpto',
            'contratistas.id', 'contratistas.id_riesgos', 'contratistas.id_banco', 
            'contratistas.id_pension', 'contratistas.id_eps', 'contratistas.id_area', 'contratistas.nombres', 
            'contratistas.apellidos', 'contratistas.num_doc', 'contratistas.id_mpio', 'contratistas.telefono', 
            'contratistas.tp_cuenta', 'contratistas.num_cuenta', 'contratistas.email', 'contratistas.tp_doc' ,
            'contratistas.direccion', 'contratistas.fec_nac', 'contratistas.nomFull', 'contratistas.is_rol',
            'salud.nombre as nombreSalud', 'banco.nombre as nombreBanco', 'arl.nombre as nombreArl', 
            'pension.nombre as nombrePension', 'area.nombres as nombreArea')
            ->paginate(9999999999999999999999999);
        
        return [
            'contratistas' => $contratistas
        ];
    }

    public function selectContratista(Request $request)
    {
        $contratistas = Contratista::select('id','nombres', 'nomFull', 'num_doc')
            ->orderBy('nomFull', 'asc')->get();
        return [
            'contratistas' => $contratistas
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $contratistas = new Contratista();
        $contratistas->nombres = $request->nombres;
        $contratistas->apellidos = $request->apellidos;
        $contratistas->tp_doc = $request->tp_doc;
        $contratistas->num_doc = $request->num_doc;
        $contratistas->id_mpio = $request->id_mpio;
        $contratistas->telefono = $request->telefono;
        $contratistas->tp_cuenta = $request->tp_cuenta;
        $contratistas->num_cuenta = $request->num_cuenta;
        $contratistas->email = $request->email;
        $contratistas->direccion = $request->direccion;
        $contratistas->fec_nac = $request->fec_nac;
        $contratistas->id_eps = $request->id_eps;
        $contratistas->id_pension = $request->id_pension;
        $contratistas->id_riesgos = $request->id_riesgos;
        $contratistas->id_banco = $request->id_banco;
        $contratistas->id_area = $request->id_area;
        $contratistas->is_rol = $request->is_rol;
        $contratistas->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $contratistas = Contratista::findOrFail($request->id);
        $contratistas->nombres = $request->nombres;
        $contratistas->apellidos = $request->apellidos;
        $contratistas->tp_doc = $request->tp_doc;
        $contratistas->num_doc = $request->num_doc;
        $contratistas->id_mpio = $request->id_mpio;
        $contratistas->telefono = $request->telefono;
        $contratistas->tp_cuenta = $request->tp_cuenta;
        $contratistas->num_cuenta = $request->num_cuenta;
        $contratistas->email = $request->email;
        $contratistas->direccion = $request->direccion;
        $contratistas->fec_nac = $request->fec_nac;
        $contratistas->id_eps = $request->id_eps;
        $contratistas->id_pension = $request->id_pension;
        $contratistas->id_riesgos = $request->id_riesgos;
        $contratistas->id_banco = $request->id_banco;
        $contratistas->id_area = $request->id_area;
        $contratistas->is_rol = $request->is_rol;
        $contratistas->save();
    }


    public function destroy(Request $request)
    {
        $contratistas= Contratista::findOrfail($request->id);
        $contratistas->delete();
    }
}
