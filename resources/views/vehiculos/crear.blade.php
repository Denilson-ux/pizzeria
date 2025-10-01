@extends('adminlte::page')

@section('title', 'Nuevo Vehículo')

@section('content_header')
    <h1>Registrar Vehículo</h1>
@stop

@section('content')
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tipo de Vehículo</label>
            <select name="tipo_vehiculo_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Repartidor</label>
            <select name="repartidor_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($repartidores as $repartidor)
                    <option value="{{ $repartidor->id }}">{{ $repartidor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
