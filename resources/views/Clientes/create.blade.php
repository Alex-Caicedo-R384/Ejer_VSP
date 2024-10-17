@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Cliente</h1>
        
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="Nombre" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
