@extends('layouts.app')

@section('content')
    <h1>Resultados de Cruce</h1>

    @if(isset($response) && $response->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Suma de Montos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $item)
                    <tr>
                        <td>{{ $item['Id'] }}</td>
                        <td>{{ $item['Nombre'] }}</td>
                        <td>{{ number_format($item['SumaMontos'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total:</strong></td>
                    <td>{{ number_format($response->sum('SumaMontos'), 2) }}</td>
                </tr>
            </tfoot>
        </table>
    @else
        <p>No se encontraron resultados para este rango de fechas.</p>
    @endif
@endsection
