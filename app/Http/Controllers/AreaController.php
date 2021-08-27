<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $areas = Area::paginate(9999999999999999999999);
        
        return [
            'areas' => $areas
        ];
    }

    public function selectArea(Request $request)
    {
        $areas = Area::select('id','nombres')
            ->orderBy('nombres', 'asc')->get();
        return [
            'areas' => $areas
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $areas = new Area();
        $areas->nombres = $request->nombres;
        $areas->save();
    }
    
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $areas = Area::findOrFail($request->id);
        $areas->nombres = $request->nombres;
        $areas->save();
    }


    public function destroy(Request $request)
    {
        $areas= Area::findOrfail($request->id);
        $areas->delete();
    }
}
