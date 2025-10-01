@extends('adminlte::page')

@section('title', 'Detalles del Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Detalles del Cliente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID:</strong> {{ $cliente->id }}</li>
            <li class="list-group-item"><strong>CI:</strong> {{ $cliente->ci }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
            <li class="list-group-item"><strong>Paterno:</strong> {{ $cliente->paterno }}</li>
            <li class="list-group-item"><strong>Materno:</strong> {{ $cliente->materno }}</li>
            <li class="list-group-item"><strong>Teléfono:</strong> {{ $cliente->telefono }}</li>
            <li class="list-group-item"><strong>Correo:</strong> {{ $cliente->correo }}</li>
        </ul>
        <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-warning mt-3"><i class="fas fa-edit"></i> Editar</a>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>
@stop
