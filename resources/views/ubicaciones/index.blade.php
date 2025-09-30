@extends('adminlte::page')

@section('title', 'Gestión de Ubicaciones')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-map-marker-alt mr-2"></i>Gestión de Ubicaciones</h1>
        <a href="{{ route('ubicaciones.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle mr-2"></i>Nueva Ubicación
        </a>
    </div>
@stop

@section('content')
    <!-- Alertas -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">¡Éxito!</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle fa-2x mr-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">¡Error!</h5>
                    <p class="mb-0">{{ session('error') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="info-box bg-gradient-primary text-white">
                <span class="info-box-icon"><i class="fas fa-map-marker-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Ubicaciones</span>
                    <span class="info-box-number">{{ $ubicaciones->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-gradient-success text-white">
                <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Activas</span>
                    <span class="info-box-number">{{ $ubicaciones->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta de contenido principal -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list-alt mr-2"></i>Lista de Ubicaciones Registradas
                </h5>
                <span class="badge badge-light badge-pill py-2 px-3">
                    <i class="fas fa-database mr-1"></i>{{ $ubicaciones->count() }} registros
                </span>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($ubicaciones->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-light-primary">
                            <tr>
                                <th class="text-center" width="80">
                                    <i class="fas fa-hashtag"></i> ID
                                </th>
                                <th>
                                    <i class="fas fa-map-marker-alt mr-1"></i>Dirección
                                </th>
                                <th>
                                    <i class="fas fa-signs-post mr-1"></i>Referencia
                                </th>
                                <th class="text-center" width="150">
                                    <i class="fas fa-calendar-alt mr-1"></i>Fecha Creación
                                </th>
                                <th class="text-center" width="200">
                                    <i class="fas fa-cogs mr-1"></i>Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ubicaciones as $ubicacion)
                                <tr class="transition-all">
                                    <td class="text-center">
                                        <span class="badge badge-primary badge-pill py-2 px-3 font-weight-bold">
                                            #{{ $ubicacion->id }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                            <div>
                                                <h6 class="mb-0 font-weight-bold text-dark">{{ $ubicacion->direccion }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($ubicacion->referencia)
                                            <span class="text-muted">{{ $ubicacion->referencia }}</span>
                                        @else
                                            <span class="text-muted font-italic">Sin referencia</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-clock mr-1"></i>
                                            {{ $ubicacion->created_at->format('d/m/Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('ubicaciones.show', $ubicacion) }}" 
                                               class="btn btn-info btn-sm btn-action"
                                               data-toggle="tooltip"
                                               title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('ubicaciones.edit', $ubicacion) }}" 
                                               class="btn btn-warning btn-sm btn-action"
                                               data-toggle="tooltip"
                                               title="Editar ubicación">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ubicaciones.destroy', $ubicacion) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta ubicación?\nEsta acción no se puede deshacer.');">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm btn-action"
                                                        data-toggle="tooltip"
                                                        title="Eliminar ubicación">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-map-marked-alt fa-5x text-muted mb-4"></i>
                        <h3 class="text-muted">No hay ubicaciones registradas</h3>
                        <p class="text-muted mb-4">Comienza agregando la primera ubicación a tu sistema</p>
                        <a href="{{ route('ubicaciones.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus-circle mr-2"></i>Crear Primera Ubicación
                        </a>
                    </div>
                </div>
            @endif
        </div>
        
        @if($ubicaciones->count() > 0)
            <div class="card-footer bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        <i class="fas fa-info-circle mr-1"></i>
                        Mostrando <strong>{{ $ubicaciones->count() }}</strong> ubicaciones registradas
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        
        .card-header {
            border-bottom: none;
            font-weight: 600;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%) !important;
        }
        
        .bg-gradient-success {
            background: linear-gradient(135deg, #27ae60 0%, #219653 100%) !important;
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
        }
        
        .bg-gradient-warning {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%) !important;
        }
        
        .bg-light-primary {
            background-color: rgba(231, 76, 60, 0.1) !important;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: #2c3e50;
        }
        
        .btn-action {
            border-radius: 6px;
            margin: 0 2px;
            transition: all 0.3s ease;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .transition-all:hover {
            background-color: rgba(231, 76, 60, 0.05) !important;
            transform: translateX(5px);
        }
        
        .info-box {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .info-box:hover {
            transform: translateY(-5px);
        }
        
        .empty-state {
            padding: 3rem 1rem;
        }
        
        .badge-pill {
            border-radius: 50px;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .table-responsive {
            border-radius: 0 0 10px 10px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Inicializar tooltips
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'hover'
            });
            
            // Auto-ocultar alertas después de 5 segundos
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Efecto de carga suave
            $('.card').hide().fadeIn(800);
            
            // Confirmación mejorada para eliminar
            $('form[onsubmit]').on('submit', function(e) {
                const form = this;
                e.preventDefault();
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74c3c',
                    cancelButtonColor: '#95a5a6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    background: '#fff',
                    iconColor: '#e74c3c'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@stop