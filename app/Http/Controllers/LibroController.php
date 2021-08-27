<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Libro;
use App\Arl;
use App\User; 
use App\Notifications\NotifyAdmin;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');

            $libros = Libro::paginate(9999999999999999999999);
        
        return [
            'libros' => $libros
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $libros = new Libro();
        $libros->nombre = $request->nombre;
        $libros->codigo = $request->codigo;
        $libros->n_pag = $request->n_pag;
        $libros->edicion = $request->edicion;
        $libros->save();

        try {
            DB::beginTransaction();

            $mytime= Carbon::now('America/Bogota');


            $fechaActual= date('Y-m-d');
            $numLibros = DB::table('libros')->whereDate('created_at', $fechaActual)->count(); 
            $numArls = DB::table('arl')->whereDate('created_at', $fechaActual)->count();

            $arregloDatos = [ 
                'libro' => [ 
                        'numero' => $numLibros, 
                        'msj' => 'Libros' 
                    ],
                'arl1' => [ 
                        'numero' => $numArls,
                        'msj' => 'Arl' 
                    ]
            ];
            $allUsers = User::all();

            foreach ($allUsers as $notificar) { 
                User::findOrFail($notificar->id)->notify(new NotifyAdmin($arregloDatos)); 
            }


            DB::commit();
        }   
        catch (Exception $e){
            DB::rollBack();
        }
    }

    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');
        $libros = Libro::findOrFail($request->id);
        $libros->nombre = $request->nombre;
        $libros->codigo = $request->codigo;
        $libros->n_pag = $request->n_pag;
        $libros->edicion = $request->edicion;
        $libros->save();
    }


    public function destroy(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');
        $libros= Libro::findOrfail($request->id);
        $libros->delete();
    }
}
