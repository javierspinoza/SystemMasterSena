<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aprendiz;

class AprendicesController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar=='') {
            $aprendices= Aprendiz::orderBy('nombres','asc')->paginate(4);
        }else {
            $aprendices= Aprendiz::where($criterio, 'like', '%'.$buscar. '%')->orderBy('nombres','asc')
            ->paginate(4);
        }
        

        return [
            'pagination' => [
                'total'        => $aprendices->total(),
                'current_page' => $aprendices->currentPage(),
                'per_page'     => $aprendices->perPage(),
                'last_page'    => $aprendices->lastPage(),
                'from'         => $aprendices->firstItem(),
                'to'           => $aprendices->lastItem(),
            ],
            'aprendices' => $aprendices
        ];
    }

    public function selectAprendiz(Request $request){

        if (!$request->ajax()) return redirect('/');

        $aprendices= Aprendiz::where('edo','=','1')

        ->select('id','nombres', 'nomFull')->orderBy('nomFull', 'asc')->get();
        return ['aprendices' => $aprendices];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $aprendices = new Aprendiz();
        $aprendices->nombres = $request->nombres;
        $aprendices->apellidos = $request->apellidos;
        $aprendices->email = $request->email;
        $aprendices->telefono = $request->telefono;
        $aprendices->edo = '1';
        $aprendices->save();
    }
  
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $aprendices = Aprendiz::findOrFail($request->id);
        $aprendices->nombres = $request->nombres;
        $aprendices->apellidos = $request->apellidos;
        $aprendices->email = $request->email;
        $aprendices->telefono = $request->telefono;
        $aprendices->edo = '1';
        $aprendices->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $aprendices = Aprendiz::findOrFail($request->id);
        $aprendices->edo = '0';
        $aprendices->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $aprendices = Aprendiz::findOrFail($request->id);
        $aprendices->edo = '1';
        $aprendices->save();
    }
}
