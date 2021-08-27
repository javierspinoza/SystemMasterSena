<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $bancos = Banco::paginate(9999999999999999999999);
        
        return [
            'bancos' => $bancos
        ];
    }

    public function selectBanco(Request $request)
    {
        $bancos = Banco::select('id','nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'bancos' => $bancos
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $bancos = new Banco();
        $bancos->nombre = $request->nombre;
        $bancos->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $bancos = Banco::findOrFail($request->id);
        $bancos->nombre = $request->nombre;
        $bancos->save();
    }


    public function destroy(Request $request)
    {
        $bancos= Banco::findOrfail($request->id);
        $bancos->delete();
    }
}
