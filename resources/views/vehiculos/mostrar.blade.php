@extends('adminlte::page')

@section('title', 'Detalle Vehículo')

@section('content_header')
    <h1>Detalle del Vehículo</h1>
@stop

@section('content')
    <ul class="list-group">
        <li class="list-group-item"><strong>Color:</strong> {{ $vehiculo->color }}</li>
        <li class="list-group-item"><strong>Marca:</strong> {{ $vehiculo->marca }}</li>
        <li class="list-group-item"><strong>Modelo:</strong> {{ $vehiculo->modelo }}</li>
        <li class="list-group-item"><strong>Placa:</strong> {{ $vehiculo->placa }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $vehiculo->tipoVehiculo->nombre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Repartidor:</strong> {{ $vehiculo->repartidor->nombre ?? 'N/A' }}</li>
    </ul>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@stop
