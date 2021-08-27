<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ficha;
use App\Contratista;

class FichaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $fichas = Ficha::join('contratistas','fichas.id_lider','=','contratistas.id')
            ->select('fichas.id','fichas.num_ficha','fichas.nombre','fichas.edo',
            'fichas.id_lider','contratistas.nomFull', 'contratistas.num_doc')
            ->orderBy('fichas.id', 'desc')->paginate(3);
        }
        else{
            $fichas = Ficha::join('contratistas','fichas.id_lider','=','contratistas.id')
            ->select('fichas.id','fichas.num_ficha','fichas.nombre','fichas.edo',
            'fichas.id_lider','contratistas.nombres as nomContra', 'contratistas.num_doc')
            ->where($criterio, 'like', '%'.$buscar. '%')
            ->orderBy('fichas.id', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $fichas->total(),
                'current_page' => $fichas->currentPage(),
                'per_page'     => $fichas->perPage(),
                'last_page'    => $fichas->lastPage(),
                'from'         => $fichas->firstItem(),
                'to'           => $fichas->lastItem(),
            ],
            'fichas' => $fichas
        ];
    }

    public function selectFicha(Request $request){

        if (!$request->ajax()) return redirect('/');

        $fichas= Ficha::where('edo','=','1')

        ->select('id','num_ficha')->orderBy('num_ficha', 'asc')->get();
        return ['fichas' => $fichas];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $fichas = new Ficha();
        $fichas->num_ficha = $request->num_ficha;
        $fichas->nombre = $request->nombre;
        $fichas->id_lider = $request->id_lider;
        $fichas->edo = '1';
        $fichas->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $fichas = Ficha::findOrFail($request->id);
        $fichas->num_ficha = $request->num_ficha;
        $fichas->nombre = $request->nombre;
        $fichas->id_lider = $request->id_lider;
        $fichas->edo = '1';
        $fichas->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $fichas = Ficha::findOrFail($request->id);
        $fichas->edo = '0';
        $fichas->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $fichas = Ficha::findOrFail($request->id);
        $fichas->edo = '1';
        $fichas->save();
    }
}
