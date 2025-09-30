@extends('adminlte::page')

@section('title', 'Detalle de Tipo de Vehículo')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-eye mr-2"></i>Detalle de Tipo de Vehículo</h1>
        <div>
            <a href="{{ route('tipovehiculos.edit', $tipovehiculo) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <a href="{{ route('tipovehiculos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>Volver al Listado
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Tarjeta de información principal -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-info text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-car-side mr-2"></i>{{ $tipovehiculo->nombre }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Información básica -->
                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-pizza mb-2">
                                    <i class="fas fa-hashtag mr-2"></i>Información del Registro
                                </h6>
                                <div class="pl-3">
                                    <p class="mb-2">
                                        <strong>ID:</strong> 
                                        <span class="badge badge-primary badge-pill">#{{ $tipovehiculo->id }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Estado:</strong> 
                                        @if($tipovehiculo->estado)
                                            <span class="badge badge-success badge-pill py-2 px-3">
                                                <i class="fas fa-check-circle mr-1"></i>Activo
                                            </span>
                                        @else
                                            <span class="badge badge-danger badge-pill py-2 px-3">
                                                <i class="fas fa-times-circle mr-1"></i>Inactivo
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Metadatos -->
                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-pizza mb-2">
                                    <i class="fas fa-history mr-2"></i>Historial
                                </h6>
                                <div class="pl-3">
                                    <p class="mb-2">
                                        <strong>Creado:</strong> 
                                        <span class="text-muted">{{ $tipovehiculo->created_at->format('d/m/Y H:i') }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <strong>Actualizado:</strong> 
                                        <span class="text-muted">{{ $tipovehiculo->updated_at->format('d/m/Y H:i') }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="info-item">
                        <h6 class="font-weight-bold text-pizza mb-2">
                            <i class="fas fa-align-left mr-2"></i>Descripción
                        </h6>
                        <div class="pl-3">
                            @if($tipovehiculo->descripcion)
                                <div class="description-box p-3 bg-light rounded">
                                    <p class="mb-0">{{ $tipovehiculo->descripcion }}</p>
                                </div>
                            @else
                                <div class="text-center py-4 text-muted">
                                    <i class="fas fa-comment-slash fa-2x mb-2"></i>
                                    <p class="mb-0">Sin descripción disponible</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de acciones rápidas -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-light">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-bolt mr-2"></i>Acciones Rápidas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('tipovehiculos.edit', $tipovehiculo) }}" 
                               class="btn btn-warning btn-block py-3">
                                <i class="fas fa-edit fa-2x mb-2"></i>
                                <div>Editar Vehículo</div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <form action="{{ route('tipovehiculos.destroy', $tipovehiculo) }}" 
                                  method="POST" 
                                  class="d-inline-block w-100"
                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tipo de vehículo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block py-3">
                                    <i class="fas fa-trash fa-2x mb-2"></i>
                                    <div>Eliminar</div>
                                </button>
                            </form>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('tipovehiculos.index') }}" 
                               class="btn btn-secondary btn-block py-3">
                                <i class="fas fa-list fa-2x mb-2"></i>
                                <div>Ver Todos</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas de uso (puedes personalizar según tu lógica) -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-light">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-chart-bar mr-2"></i>Información Adicional
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-number text-primary">0</div>
                                <div class="stat-label">Vehiculos Activos</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-number text-info">0</div>
                                <div class="stat-label">Pedidos Hoy</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-number text-success">0</div>
                                <div class="stat-label">Entregados</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-number text-warning">0</div>
                                <div class="stat-label">En Curso</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 15px;
            border: none;
        }
        
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: none;
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
        }
        
        .info-item {
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f9fa;
            border-left: 4px solid var(--pizza-red);
            margin-bottom: 20px;
        }
        
        .info-item:last-child {
            margin-bottom: 0;
        }
        
        .description-box {
            border-left: 4px solid var(--pizza-olive);
            background-color: #f8f9fa !important;
        }
        
        .btn {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-block {
            height: 100%;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--pizza-orange) 0%, var(--pizza-cheese) 100%);
            border: none;
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(230, 126, 34, 0.4);
        }
        
        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
        }
        
        .badge-pill {
            border-radius: 50px;
            font-size: 0.9rem;
        }
        
        .stat-card {
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f9fa;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            background-color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .text-pizza {
            color: var(--pizza-red) !important;
        }
        
        /* Efectos de animación */
        .card {
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Efectos de hover en las tarjetas de acción
            $('.btn-block').hover(
                function() {
                    $(this).css('transform', 'translateY(-3px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
            
            // Confirmación mejorada para eliminar
            $('form[onsubmit]').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción eliminará permanentemente el tipo de vehículo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74c3c',
                    cancelButtonColor: '#95a5a6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    background: '#fff',
                    backdrop: `
                        rgba(231, 76, 60, 0.1)
                    `
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
            
            // Animación de entrada escalonada
            $('.card').each(function(index) {
                $(this).delay(200 * index).queue(function(next) {
                    $(this).addClass('animate__animated animate__fadeInUp');
                    next();
                });
            });
        });
    </script>
@stop