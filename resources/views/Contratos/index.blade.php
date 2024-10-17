@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Contratos</h1>
    <a href="{{ route('contratos.create') }}" class="btn btn-primary mb-3">Agregar Contrato</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Nombre del Producto</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contratos as $contrato)
                <tr>
                    <td>{{ $contrato->id }}</td>
                    <td>{{ $contrato->cliente->Nombre }}</td> <!-- Asegúrate de que esto es correcto -->
                    <td>{{ $contrato->Nombre }}</td>
                    <td>{{ $contrato->Monto }}</td>
                    <td>{{ $contrato->Fecha }}</td>
                    <td>
                        <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
