<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pension;

class PensionController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $pensiones = Pension::paginate(9999999999999999999999);
        
        return [
            'pensiones' => $pensiones
        ];
    }

    public function selectPension(Request $request)
    {
        $pensiones = Pension::select('id','nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'pensiones' => $pensiones
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $pensiones = new Pension();
        $pensiones->nombre = $request->nombre;
        $pensiones->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $pensiones = Pension::findOrFail($request->id);
        $pensiones->nombre = $request->nombre;
        $pensiones->save();
    }


    public function destroy(Request $request)
    {
        $pensiones= Pension::findOrfail($request->id);
        $pensiones->delete();
    }
}
