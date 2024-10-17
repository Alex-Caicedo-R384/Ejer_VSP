@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Agregar Cliente</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->Nombre }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
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
