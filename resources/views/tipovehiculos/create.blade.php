@extends('adminlte::page')

@section('title', 'Nuevo Tipo de Vehículo')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-car-side mr-2"></i>Registrar Tipo de Vehículo</h1>
        <a href="{{ route('tipovehiculos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i>Volver al Listado
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-pizza text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus-circle mr-2"></i>Información del Tipo de Vehículo
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('tipovehiculos.store') }}" method="POST" id="vehicleTypeForm">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label for="nombre" class="font-weight-bold text-pizza">
                                <i class="fas fa-tag mr-2"></i>Nombre del Vehículo <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre"
                                   class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                                   value="{{ old('nombre') }}" 
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
                                      placeholder="Describe las características, capacidades o especificaciones del vehículo...">{{ old('descripcion') }}</textarea>
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
                                       checked>
                                <label class="custom-control-label" for="estado">
                                    <span class="state-label active">Activo</span>
                                    <span class="state-label inactive" style="display: none;">Inactivo</span>
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Los vehículos activos estarán disponibles para asignación
                            </small>
                        </div>

                        <!-- Previsualización en tiempo real -->
                        <div class="card preview-card mt-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fas fa-eye mr-2"></i>Vista Previa
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nombre:</strong>
                                        <span id="preview-nombre" class="text-muted">-</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Estado:</strong>
                                        <span id="preview-estado" class="badge badge-success">Activo</span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <strong>Descripción:</strong>
                                        <p id="preview-descripcion" class="text-muted mb-0">-</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <button type="submit" class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-save mr-2"></i>Guardar Vehículo
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
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--pizza-red);
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
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
        
        .btn-success {
            background: linear-gradient(135deg, var(--pizza-olive) 0%, #2ecc71 100%);
            border: none;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.4);
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
        
        .text-pizza {
            color: var(--pizza-red) !important;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Previsualización en tiempo real
            function updatePreview() {
                const nombre = $('#nombre').val() || '-';
                const descripcion = $('#descripcion').val() || '-';
                const estado = $('#estado').is(':checked');
                
                $('#preview-nombre').text(nombre);
                $('#preview-descripcion').text(descripcion);
                
                if (estado) {
                    $('#preview-estado').removeClass('badge-danger').addClass('badge-success').text('Activo');
                } else {
                    $('#preview-estado').removeClass('badge-success').addClass('badge-danger').text('Inactivo');
                }
            }
            
            // Actualizar preview al cambiar los campos
            $('#nombre, #descripcion').on('input', updatePreview);
            $('#estado').change(updatePreview);
            
            // Toggle del estado
            $('#estado').change(function() {
                if ($(this).is(':checked')) {
                    $('.state-label.active').show();
                    $('.state-label.inactive').hide();
                } else {
                    $('.state-label.active').hide();
                    $('.state-label.inactive').show();
                }
            });
            
            // Validación del formulario
            $('#vehicleTypeForm').on('submit', function(e) {
                const nombre = $('#nombre').val().trim();
                
                if (!nombre) {
                    e.preventDefault();
                    $('#nombre').addClass('is-invalid');
                    $('html, body').animate({
                        scrollTop: $('#nombre').offset().top - 100
                    }, 500);
                    return false;
                }
            });
            
            // Efectos visuales
            $('.card').hide().fadeIn(600);
            
            // Focus en el primer campo
            setTimeout(function() {
                $('#nombre').focus();
            }, 800);
            
            // Inicializar preview
            updatePreview();
        });
    </script>
@stop