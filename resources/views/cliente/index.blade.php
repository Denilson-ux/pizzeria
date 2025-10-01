@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-users mr-2"></i>Gestión de Clientes</h1>
        <a href="{{ route('cliente.create') }}" class="btn btn-success">
            <i class="fas fa-plus mr-1"></i>Nuevo Cliente
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i>{{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-gradient-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-list mr-2"></i>Lista de Clientes</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" width="60">ID</th>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th class="text-center" width="180">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $c)
                            <tr>
                                <td class="text-center font-weight-bold text-primary">{{ $c->id }}</td>
                                <td class="font-weight-bold">{{ $c->ci }}</td>
                                <td>{{ $c->nombre }}</td>
                                <td>{{ $c->paterno }}</td>
                                <td>{{ $c->materno }}</td>
                                <td>{{ $c->telefono }}</td>
                                <td>{{ $c->correo }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('cliente.show', $c) }}" class="btn btn-info btn-sm" title="Ver detalles" data-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('cliente.edit', $c) }}" class="btn btn-warning btn-sm" title="Editar" data-toggle="tooltip">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cliente.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="tooltip">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">No hay clientes registrados</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
