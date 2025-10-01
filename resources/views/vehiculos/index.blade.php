@extends('adminlte::page')

@section('title', 'Vehículos')

@section('content_header')
    <h1>Gestión de Vehículos</h1>
@stop

@section('content')
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary mb-3">Nuevo Vehículo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Tipo</th>
                <th>Repartidor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->tipoVehiculo->nombre ?? 'N/A' }}</td>
                    <td>{{ $vehiculo->repartidor->nombre ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este vehículo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vehiculos->links() }}
@stop
