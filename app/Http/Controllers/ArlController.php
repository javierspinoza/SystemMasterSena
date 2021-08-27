<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Arl;
use App\Libro;
use App\User; 
use App\Notifications\NotifyAdmin;

class ArlController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $arl = Arl::paginate(9999999999999999999999);
        
        return [
            'arl' => $arl
        ];
    }

    public function selectArl(Request $request)
    {
        $arl = Arl::select('id','nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'arl' => $arl
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $arl = new Arl();
        $arl->nombre = $request->nombre;
        $arl->save();

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
        if (!$request->ajax()) return redirect('/');

        $arl = Arl::findOrFail($request->id);
        $arl->nombre = $request->nombre;
        $arl->save();
    }


    public function destroy(Request $request)
    {
        $arl= Arl::findOrfail($request->id);
        $arl->delete();
    }
}
