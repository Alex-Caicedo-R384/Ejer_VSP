<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::with('cliente')->get();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('contratos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ClienteID' => 'required|exists:clientes,ClienteId',
            'Nombre' => 'required',
            'Monto' => 'required|numeric',
            'Fecha' => 'required|date'
        ]);

        Contrato::create($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato creado exitosamente.');
    }

    public function show($id)
    {
        $contrato = Contrato::with('cliente')->findOrFail($id);
        return view('contratos.show', compact('contrato'));
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrFail($id);
        $clientes = Cliente::all();
        return view('contratos.edit', compact('contrato', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ClienteID' => 'required|exists:clientes,ClienteId',
            'Nombre' => 'required',
            'Monto' => 'required|numeric',
            'Fecha' => 'required|date'
        ]);

        $contrato = Contrato::findOrFail($id);
        $contrato->update($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();
        return redirect()->route('contratos.index')->with('success', 'Contrato eliminado exitosamente.');
    }
}
