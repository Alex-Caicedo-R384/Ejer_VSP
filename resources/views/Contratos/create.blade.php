@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Contrato</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contratos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ClienteID">Cliente</label>
            <select name="ClienteID" id="ClienteID" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre del Producto</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Monto">Monto</label>
            <input type="number" name="Monto" id="Monto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Fecha">Fecha</label>
            <input type="date" name="Fecha" id="Fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Contrato</button>
    </form>
</div>
@endsection
