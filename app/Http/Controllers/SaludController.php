<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Salud;

class SaludController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $salud = Salud::paginate(9999999999999999999999);
        
        return [
            'salud' => $salud
        ];
    }

    public function selectSalud(Request $request)
    {
        $salud = Salud::select('id','nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'salud' => $salud
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $salud = new Salud();
        $salud->nombre = $request->nombre;
        $salud->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $salud = Salud::findOrFail($request->id);
        $salud->nombre = $request->nombre;
        $salud->save();
    }


    public function destroy(Request $request)
    {
        $salud= Salud::findOrfail($request->id);
        $salud->delete();
    }
}
