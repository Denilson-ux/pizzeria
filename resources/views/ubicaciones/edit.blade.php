@extends('adminlte::page')

@section('title', 'Editar Ubicación')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-map-marker-alt mr-2"></i>Editar Ubicación</h1>
        <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">
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
                        <i class="fas fa-edit mr-2"></i>Editando: {{ $ubicacione->direccion }}
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ubicaciones.update', $ubicacione) }}" method="POST" id="editLocationForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Información del registro -->
                        <div class="alert alert-info border-0 mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle fa-2x mr-3 text-info"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Editando Ubicación #{{ $ubicacione->id }}</h6>
                                    <p class="mb-0 small">
                                        <strong>Creado:</strong> {{ $ubicacione->created_at->format('d/m/Y H:i') }} | 
                                        <strong>Actualizado:</strong> {{ $ubicacione->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="direccion" class="font-weight-bold text-pizza">
                                <i class="fas fa-map-marker-alt mr-2"></i>Dirección <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="direccion" 
                                   id="direccion"
                                   class="form-control form-control-lg @error('direccion') is-invalid @enderror" 
                                   value="{{ old('direccion', $ubicacione->direccion) }}"
                                   placeholder="Ingrese la dirección completa (calle, número, colonia, ciudad)"
                                   required
                                   maxlength="255">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Dirección completa para entregas y referencias
                            </small>
                            @error('direccion')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="referencia" class="font-weight-bold text-pizza">
                                <i class="fas fa-signs-post mr-2"></i>Referencia
                            </label>
                            <textarea name="referencia" 
                                      id="referencia"
                                      class="form-control @error('referencia') is-invalid @enderror" 
                                      rows="4"
                                      placeholder="Puntos de referencia, indicaciones adicionales, características del lugar...">{{ old('referencia', $ubicacione->referencia) }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Información adicional para facilitar la ubicación (opcional)
                            </small>
                            @error('referencia')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}
                                </div>
                            @enderror
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
                                        <strong>Dirección:</strong>
                                        <span id="preview-direccion" class="{{ $ubicacione->direccion != old('direccion', $ubicacione->direccion) ? 'text-warning font-weight-bold' : 'text-muted' }}">
                                            {{ old('direccion', $ubicacione->direccion) }}
                                        </span>
                                        @if($ubicacione->direccion != old('direccion', $ubicacione->direccion))
                                            <small class="text-warning d-block">
                                                <i class="fas fa-arrow-right mr-1"></i>Modificada
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Referencia:</strong>
                                        <span id="preview-referencia" class="{{ $ubicacione->referencia != old('referencia', $ubicacione->referencia) ? 'text-warning font-weight-bold' : 'text-muted' }}">
                                            {{ old('referencia', $ubicacione->referencia) ?: 'Sin referencia' }}
                                        </span>
                                        @if($ubicacione->referencia != old('referencia', $ubicacione->referencia))
                                            <small class="text-warning d-block">
                                                <i class="fas fa-arrow-right mr-1"></i>Modificada
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
                                        <i class="fas fa-save mr-2"></i>Actualizar Ubicación
                                    </button>
                                    <a href="{{ route('ubicaciones.index') }}" class="btn btn-outline-secondary btn-lg px-4">
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
        
        .preview-card {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
        }
        
        .preview-card .card-header {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6;
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
        
        .text-pizza {
            color: var(--pizza-red) !important;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Detectar cambios en tiempo real
            function detectChanges() {
                const originalDireccion = "{{ $ubicacione->direccion }}";
                const originalReferencia = "{{ $ubicacione->referencia ?? '' }}";
                
                const currentDireccion = $('#direccion').val();
                const currentReferencia = $('#referencia').val();
                
                // Actualizar estilos de cambios
                if (currentDireccion !== originalDireccion) {
                    $('#preview-direccion').addClass('text-changed');
                } else {
                    $('#preview-direccion').removeClass('text-changed');
                }
                
                if (currentReferencia !== originalReferencia) {
                    $('#preview-referencia').addClass('text-changed');
                } else {
                    $('#preview-referencia').removeClass('text-changed');
                }
                
                // Actualizar preview
                $('#preview-direccion').text(currentDireccion || '-');
                $('#preview-referencia').text(currentReferencia || 'Sin referencia');
            }
            
            // Actualizar al cambiar los campos
            $('#direccion, #referencia').on('input', detectChanges);
            
            // Validación del formulario
            $('#editLocationForm').on('submit', function(e) {
                const direccion = $('#direccion').val().trim();
                
                if (!direccion) {
                    e.preventDefault();
                    $('#direccion').addClass('is-invalid');
                    $('html, body').animate({
                        scrollTop: $('#direccion').offset().top - 100
                    }, 500);
                    return false;
                }
                
                // Confirmar si hay cambios
                const hasChanges = $('.text-changed').length > 0;
                if (!hasChanges) {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Sin cambios?',
                        text: 'No se detectaron modificaciones en la ubicación.',
                        icon: 'info',
                        confirmButtonColor: 'var(--pizza-orange)',
                        confirmButtonText: 'Entendido'
                    });
                    return false;
                }
            });
            
            // Efectos visuales
            $('.card').hide().fadeIn(600);
            
            // Focus en el primer campo
            setTimeout(function() {
                $('#direccion').focus();
            }, 800);
            
            // Inicializar detección de cambios
            detectChanges();
            
            // Contador de caracteres para dirección
            $('#direccion').on('input', function() {
                const length = $(this).val().length;
                const maxLength = 255;
                const counter = $(this).next('.form-text');
                
                if (counter.find('.char-counter').length === 0) {
                    counter.append('<span class="char-counter text-muted"></span>');
                }
                
                const counterElement = counter.find('.char-counter');
                counterElement.text(` (${length}/${maxLength} caracteres)`);
                
                if (length > maxLength * 0.8) {
                    counterElement.addClass('text-warning');
                } else {
                    counterElement.removeClass('text-warning');
                }
            });
            
            // Trigger inicial para el contador
            $('#direccion').trigger('input');
        });
    </script>
@stop