<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;

class SupervisorController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar=='') {
            $supervisores= Supervisor::orderBy('nombre','asc')->paginate(4);
        }else {
            $supervisores= Supervisor::where($criterio, 'like', '%'.$buscar. '%')->orderBy('nombre','asc')
            ->paginate(4);
        }
        

        return [
            'pagination' => [
                'total'        => $supervisores->total(),
                'current_page' => $supervisores->currentPage(),
                'per_page'     => $supervisores->perPage(),
                'last_page'    => $supervisores->lastPage(),
                'from'         => $supervisores->firstItem(),
                'to'           => $supervisores->lastItem(),
            ],
            'supervisores' => $supervisores
        ];
    }

    public function selectSupervisor(Request $request){

        if (!$request->ajax()) return redirect('/');

        $supervisores= Supervisor::where('estado','=','1')
        ->select('id','nombre', 'nomFull')->orderBy('nomFull', 'asc')->get();
        return ['supervisores' => $supervisores];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $supervisores = new Supervisor();
        $supervisores->num_doc = $request->num_doc;
        $supervisores->nombre = $request->nombre;
        $supervisores->apellido = $request->apellido;
        $supervisores->email = $request->email;
        $supervisores->grado = $request->grado;
        $supervisores->estado = '1';
        $supervisores->save();
    }
  
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $supervisores = Supervisor::findOrFail($request->id);
        $supervisores->num_doc = $request->num_doc;
        $supervisores->nombre = $request->nombre;
        $supervisores->apellido = $request->apellido;
        $supervisores->email = $request->email;
        $supervisores->grado = $request->grado;
        $supervisores->estado = '1';
        $supervisores->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $supervisores = Supervisor::findOrFail($request->id);
        $supervisores->estado = '0';
        $supervisores->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $supervisores = Supervisor::findOrFail($request->id);
        $supervisores->estado = '1';
        $supervisores->save();
    }
}
