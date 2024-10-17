@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Contrato</h1>
        
        <form action="{{ route('contratos.update', $contrato->ContratiId) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ClienteID">Cliente</label>
                <select name="ClienteID" class="form-control" required>
                    <option value="">Selecciona un Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->ClienteId }}" {{ $cliente->ClienteId == $contrato->ClienteID ? 'selected' : '' }}>{{ $cliente->Nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre del Producto</label>
                <input type="text" class="form-control" name="Nombre" value="{{ $contrato->Nombre }}" required>
            </div>
            <div class="form-group">
                <label for="Monto">Monto</label>
                <input type="number" class="form-control" name="Monto" step="0.01" value="{{ $contrato->Monto }}" required>
            </div>
            <div class="form-group">
                <label for="Fecha">Fecha</label>
                <input type="date" class="form-control" name="Fecha" value="{{ $contrato->Fecha }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
