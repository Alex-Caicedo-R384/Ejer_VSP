@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cliente</h1>
        
        <form action="{{ route('clientes.update', $cliente->ClienteId) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="Nombre" value="{{ $cliente->Nombre }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
