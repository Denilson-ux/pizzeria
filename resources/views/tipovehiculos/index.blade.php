@extends('adminlte::page')

@section('title', 'Tipos de Vehículos')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-car mr-2"></i>Gestión de Tipos de Vehículos</h1>
        <a href="{{ route('tipovehiculos.create') }}" class="btn btn-success">
            <i class="fas fa-plus mr-1"></i>Nuevo Tipo de Vehículo
        </a>
    </div>
@stop

@section('content')
    <!-- Alertas -->
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

    <!-- Tarjeta de contenido -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-gradient-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-list mr-2"></i>Lista de Tipos de Vehículos</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" width="80">ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="text-center" width="120">Estado</th>
                            <th class="text-center" width="200">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tipos as $t)
                            <tr>
                                <td class="text-center font-weight-bold text-primary">{{ $t->id }}</td>
                                <td class="font-weight-bold">{{ $t->nombre }}</td>
                                <td>{{ $t->descripcion ?? 'Sin descripción' }}</td>
                                <td class="text-center">
                                    @if($t->estado)
                                        <span class="badge badge-pill badge-success py-2 px-3">
                                            <i class="fas fa-check mr-1"></i>Activo
                                        </span>
                                    @else
                                        <span class="badge badge-pill badge-danger py-2 px-3">
                                            <i class="fas fa-times mr-1"></i>Inactivo
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('tipovehiculos.show', $t) }}" 
                                           class="btn btn-info btn-sm" 
                                           title="Ver detalles"
                                           data-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('tipovehiculos.edit', $t) }}" 
                                           class="btn btn-warning btn-sm"
                                           title="Editar"
                                           data-toggle="tooltip">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('tipovehiculos.destroy', $t) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tipo de vehículo?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm"
                                                    title="Eliminar"
                                                    data-toggle="tooltip">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">No hay tipos de vehículos registrados</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Paginación - SOLUCIÓN CORREGIDA -->
        @if($tipos instanceof \Illuminate\Pagination\AbstractPaginator && $tipos->hasPages())
            <div class="card-footer bg-white">
                {{ $tipos->links() }}
            </div>
        @endif
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .card-header {
            border-bottom: none;
            font-weight: 600;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .btn {
            border-radius: 6px;
            font-weight: 500;
        }
        
        .btn-group .btn {
            border-radius: 0;
        }
        
        .btn-group .btn:first-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        
        .btn-group .btn:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        
        .badge {
            font-size: 0.75rem;
        }
        
        /* Colores personalizados para pizzería */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%) !important;
        }
        
        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }
        
        .btn-success:hover {
            background-color: #219653;
            border-color: #219653;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(231, 76, 60, 0.05);
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Inicializar tooltips
            $('[data-toggle="tooltip"]').tooltip();
            
            // Auto-ocultar alertas después de 5 segundos
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
@stop