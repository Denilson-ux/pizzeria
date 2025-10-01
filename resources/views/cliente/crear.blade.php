@extends('adminlte::page')

@section('title', 'Crear Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Nuevo Cliente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="text" name="ci" id="ci" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" name="paterno" id="paterno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" name="materno" id="materno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Cliente</button>
            <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@stop
