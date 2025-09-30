@extends('adminlte::page')

@section('title', 'Editar Tipo de Vehículo')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-edit mr-2"></i>Editar Tipo de Vehículo</h1>
        <a href="{{ route('tipovehiculos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i>Volver al Listado
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-warning text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-edit mr-2"></i>Editando: {{ $tipovehiculo->nombre }}
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('tipovehiculos.update', $tipovehiculo) }}" method="POST" id="editVehicleForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Información del registro -->
                        <div class="alert alert-info border-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle fa-2x mr-3 text-info"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Editando Registro #{{ $tipovehiculo->id }}</h6>
                                    <p class="mb-0 small">
                                        <strong>Creado:</strong> {{ $tipovehiculo->created_at->format('d/m/Y H:i') }} | 
                                        <strong>Actualizado:</strong> {{ $tipovehiculo->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="nombre" class="font-weight-bold text-pizza">
                                <i class="fas fa-tag mr-2"></i>Nombre del Vehículo <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre"
                                   class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                                   value="{{ old('nombre', $tipovehiculo->nombre) }}" 
                                   placeholder="Ej: Motocicleta, Automóvil, Bicicleta..."
                                   required
                                   maxlength="100">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Nombre descriptivo del tipo de vehículo
                            </small>
                            @error('nombre')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="descripcion" class="font-weight-bold text-pizza">
                                <i class="fas fa-align-left mr-2"></i>Descripción
                            </label>
                            <textarea name="descripcion" 
                                      id="descripcion"
                                      class="form-control @error('descripcion') is-invalid @enderror" 
                                      rows="4"
                                      placeholder="Describe las características, capacidades o especificaciones del vehículo...">{{ old('descripcion', $tipovehiculo->descripcion) }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Información adicional sobre el tipo de vehículo (opcional)
                            </small>
                            @error('descripcion')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Estado del vehículo -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-pizza d-block">
                                <i class="fas fa-toggle-on mr-2"></i>Estado del Vehículo
                            </label>
                            <div class="custom-control custom-switch custom-switch-pizza">
                                <input type="checkbox" 
                                       class="custom-control-input" 
                                       id="estado" 
                                       name="estado" 
                                       value="1" 
                                       {{ old('estado', $tipovehiculo->estado) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="estado">
                                    <span class="state-label {{ $tipovehiculo->estado ? 'active' : 'inactive' }}">
                                        {{ $tipovehiculo->estado ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Los vehículos activos estarán disponibles para asignación
                            </small>
                        </div>

                        <!-- Resumen de cambios -->
                        <div class="card preview-card mt-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fas fa-sync-alt mr-2"></i>Resumen de Cambios
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nombre:</strong>
                                        <span id="preview-nombre" class="{{ $tipovehiculo->nombre != old('nombre', $tipovehiculo->nombre) ? 'text-warning font-weight-bold' : 'text-muted' }}">
                                            {{ old('nombre', $tipovehiculo->nombre) }}
                                        </span>
                                        @if($tipovehiculo->nombre != old('nombre', $tipovehiculo->nombre))
                                            <small class="text-warning d-block">
                                                <i class="fas fa-arrow-right mr-1"></i>Cambiado
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Estado:</strong>
                                        <span id="preview-estado" class="badge {{ $tipovehiculo->estado ? 'badge-success' : 'badge-danger' }}">
                                            {{ $tipovehiculo->estado ? 'Activo' : 'Inactivo' }}
                                        </span>
                                        @if($tipovehiculo->estado != old('estado', $tipovehiculo->estado))
                                            <small class="text-warning d-block">
                                                <i class="fas fa-arrow-right mr-1"></i>Cambiado
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <strong>Descripción:</strong>
                                        <p id="preview-descripcion" class="{{ $tipovehiculo->descripcion != old('descripcion', $tipovehiculo->descripcion) ? 'text-warning font-weight-bold' : 'text-muted' }} mb-0">
                                            {{ old('descripcion', $tipovehiculo->descripcion) ?: '-' }}
                                        </p>
                                        @if($tipovehiculo->descripcion != old('descripcion', $tipovehiculo->descripcion))
                                            <small class="text-warning">
                                                <i class="fas fa-arrow-right mr-1"></i>Modificado
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <button type="submit" class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-save mr-2"></i>Actualizar Vehículo
                                    </button>
                                    <a href="{{ route('tipovehiculos.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-times mr-2"></i>Cancelar
                                    </a>
                                </div>
                                <div class="text-muted">
                                    <i class="fas fa-asterisk text-danger mr-1"></i>Campos obligatorios
                                </div>
                            </div>
                        </div>
                    </form>
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
        
        .bg-gradient-warning {
            background: linear-gradient(135deg, var(--pizza-orange) 0%, var(--pizza-cheese) 100%) !important;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--pizza-orange);
            box-shadow: 0 0 0 0.2rem rgba(230, 126, 34, 0.25);
        }
        
        .form-control-lg {
            font-size: 1.1rem;
            padding: 12px 16px;
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--pizza-orange) 0%, var(--pizza-cheese) 100%);
            border: none;
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.4);
            color: white;
        }
        
        .btn-outline-secondary:hover {
            transform: translateY(-2px);
        }
        
        .custom-switch-pizza .custom-control-input:checked ~ .custom-control-label::before {
            background-color: var(--pizza-olive);
            border-color: var(--pizza-olive);
        }
        
        .preview-card {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
        }
        
        .preview-card .card-header {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6;
        }
        
        .state-label {
            font-weight: 500;
        }
        
        .state-label.active {
            color: var(--pizza-olive);
        }
        
        .state-label.inactive {
            color: #6c757d;
        }
        
        .invalid-feedback {
            font-weight: 500;
        }
        
        .alert-info {
            border-radius: 10px;
            border-left: 4px solid #17a2b8;
        }
        
        .text-changed {
            color: var(--pizza-orange) !important;
            font-weight: bold;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Detectar cambios en tiempo real
            function detectChanges() {
                const originalNombre = "{{ $tipovehiculo->nombre }}";
                const originalDescripcion = "{{ $tipovehiculo->descripcion ?? '' }}";
                const originalEstado = {{ $tipovehiculo->estado ? 'true' : 'false' }};
                
                const currentNombre = $('#nombre').val();
                const currentDescripcion = $('#descripcion').val();
                const currentEstado = $('#estado').is(':checked');
                
                // Actualizar estilos de cambios
                if (currentNombre !== originalNombre) {
                    $('#preview-nombre').addClass('text-changed');
                } else {
                    $('#preview-nombre').removeClass('text-changed');
                }
                
                if (currentDescripcion !== originalDescripcion) {
                    $('#preview-descripcion').addClass('text-changed');
                } else {
                    $('#preview-descripcion').removeClass('text-changed');
                }
                
                if (currentEstado !== originalEstado) {
                    $('#preview-estado').addClass('text-changed');
                } else {
                    $('#preview-estado').removeClass('text-changed');
                }
                
                // Actualizar preview
                $('#preview-nombre').text(currentNombre || '-');
                $('#preview-descripcion').text(currentDescripcion || '-');
                
                if (currentEstado) {
                    $('#preview-estado').removeClass('badge-danger').addClass('badge-success').text('Activo');
                } else {
                    $('#preview-estado').removeClass('badge-success').addClass('badge-danger').text('Inactivo');
                }
            }
            
            // Actualizar al cambiar los campos
            $('#nombre, #descripcion').on('input', detectChanges);
            $('#estado').change(detectChanges);
            
            // Toggle del estado
            $('#estado').change(function() {
                if ($(this).is(':checked')) {
                    $('.state-label').removeClass('inactive').addClass('active').text('Activo');
                } else {
                    $('.state-label').removeClass('active').addClass('inactive').text('Inactivo');
                }
                detectChanges();
            });
            
            // Validación del formulario
            $('#editVehicleForm').on('submit', function(e) {
                const nombre = $('#nombre').val().trim();
                
                if (!nombre) {
                    e.preventDefault();
                    $('#nombre').addClass('is-invalid');
                    $('html, body').animate({
                        scrollTop: $('#nombre').offset().top - 100
                    }, 500);
                    return false;
                }
                
                // Confirmar si hay cambios
                const hasChanges = $('.text-changed').length > 0;
                if (!hasChanges) {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Sin cambios?',
                        text: 'No se detectaron modificaciones en el formulario.',
                        icon: 'info',
                        confirmButtonColor: var('--pizza-orange'),
                        confirmButtonText: 'Entendido'
                    });
                    return false;
                }
            });
            
            // Efectos visuales
            $('.card').hide().fadeIn(600);
            
            // Focus en el primer campo
            setTimeout(function() {
                $('#nombre').focus();
            }, 800);
            
            // Inicializar detección de cambios
            detectChanges();
        });
    </script>
@stop