@extends('adminlte::page')

@section('title', 'Editar Vehículo')

@section('content_header')
    <h1>Editar Vehículo</h1>
@stop

@section('content')
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" class="form-control" value="{{ $vehiculo->color }}" required>
        </div>
        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ $vehiculo->marca }}" required>
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}" required>
        </div>
        <div class="form-group">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}" required>
        </div>
        <div class="form-group">
            <label>Tipo de Vehículo</label>
            <select name="tipo_vehiculo_id" class="form-control" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ $vehiculo->tipo_vehiculo_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Repartidor</label>
            <select name="repartidor_id" class="form-control" required>
                @foreach($repartidores as $repartidor)
                    <option value="{{ $repartidor->id }}" {{ $vehiculo->repartidor_id == $repartidor->id ? 'selected' : '' }}>
                        {{ $repartidor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
