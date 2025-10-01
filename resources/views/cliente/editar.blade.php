@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Cliente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('cliente.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="text" name="ci" id="ci" class="form-control" value="{{ old('ci', $cliente->ci) }}" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" name="paterno" id="paterno" class="form-control" value="{{ old('paterno', $cliente->paterno) }}" required>
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" name="materno" id="materno" class="form-control" value="{{ old('materno', $cliente->materno) }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $cliente->correo) }}" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar Cliente</button>
            <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@stop
