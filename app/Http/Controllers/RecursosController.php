<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;

class RecursosController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $recursos = Recurso::paginate(9999999999999999999999);
        
        return [
            'recursos' => $recursos
        ];
    }

    public function selectRecursos(Request $request)
    {
        $recursos = Recurso::select('id','nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'recursos' => $recursos
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $recursos = new Recurso();
        $recursos->nombre = $request->nombre;
        $recursos->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $recursos = Recurso::findOrFail($request->id);
        $recursos->nombre = $request->nombre;
        $recursos->save();
    }


    public function destroy(Request $request)
    {
        $recursos= Recurso::findOrfail($request->id);
        $recursos->delete();
    }
}
