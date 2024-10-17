@extends('layouts.app')

@section('content')
    <h1>Cruce de Contratos</h1>

    <form action="{{ route('cruces.cruce') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fechaini">Fecha Inicial</label>
            <input type="date" name="fechaini" id="fechaini" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fechafin">Fecha Final</label>
            <input type="date" name="fechafin" id="fechafin" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cruzar</button>
    </form>
@endsection
