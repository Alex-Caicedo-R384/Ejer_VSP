<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CruceController extends Controller
{
    public function index()
    {
        return view('cruces.index');
    }

    public function cruce(Request $request)
    {
        $request->validate([
            'fechaini' => 'required|date',
            'fechafin' => 'required|date|after_or_equal:fechaini'
        ]);
    
        $fechaini = $request->input('fechaini');
        $fechafin = $request->input('fechafin');
    
        $resultados = DB::table('clientes as c')
            ->join('contratos as o', 'c.id', '=', 'o.ClienteID') // Asegúrate de que el campo sea 'id' y no 'ClienteId'
            ->whereBetween('o.Fecha', [$fechaini, $fechafin])
            ->select('c.id as Id', 'c.Nombre', DB::raw('SUM(o.Monto) as SumaMontos'))
            ->groupBy('c.id', 'c.Nombre')
            ->get();
    
        $response = $resultados->map(function($item) {
            return [
                'Id' => $item->Id,
                'Nombre' => $item->Nombre,
                'SumaMontos' => $item->SumaMontos,
            ];
        });
    
        return view('cruces.resultados', compact('response'));
    }
}
