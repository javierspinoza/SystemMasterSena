<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetFichaAprendiz;
use App\Aprendiz;

class DetFichaAprendizController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

            $det_ficha_aprendiz = DetFichaAprendiz::join('fichas','det_ficha_aprendiz.id_ficha','=','fichas.id')
            ->join('aprendices','det_ficha_aprendiz.id_aprendiz','=','aprendices.id')
            ->select(
            'det_ficha_aprendiz.id', 'det_ficha_aprendiz.id_ficha', 'det_ficha_aprendiz.id_aprendiz', 
            'det_ficha_aprendiz.fec_save',
            'fichas.num_ficha as numFicha', 'aprendices.nomFull',)
            ->paginate(9999999999999999999999999);
        
        return [
            'det_ficha_aprendiz' => $det_ficha_aprendiz
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

        $det_ficha_aprendiz = new DetFichaAprendiz();
        $det_ficha_aprendiz->id_ficha = $request->id_ficha;
        $det_ficha_aprendiz->id_aprendiz = $request->id_aprendiz;
        $det_ficha_aprendiz->fec_save = $request->fec_save;
        $det_ficha_aprendiz->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $det_ficha_aprendiz = DetFichaAprendiz::findOrFail($request->id);
        $det_ficha_aprendiz->id_ficha = $request->id_ficha;
        $det_ficha_aprendiz->id_aprendiz = $request->id_aprendiz;
        $det_ficha_aprendiz->fec_save = $request->fec_save;
        $det_ficha_aprendiz->save();
    }


    public function destroy(Request $request)
    {
        $det_ficha_aprendiz= DetFichaAprendiz::findOrfail($request->id);
        $det_ficha_aprendiz->delete();
    }
}
