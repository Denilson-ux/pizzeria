@extends('adminlte::page')

@section('title', 'Crear Ubicación')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow">
        <h1 class="m-0 text-dark"><i class="fas fa-map-marker-alt mr-2"></i>Crear Nueva Ubicación</h1>
        <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i>Volver al Listado
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus-circle mr-2"></i>Información de la Ubicación
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ubicaciones.store') }}" method="POST" id="createLocationForm">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label for="direccion" class="font-weight-bold text-pizza">
                                <i class="fas fa-map-marker-alt mr-2"></i>Dirección <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="direccion" 
                                   id="direccion"
                                   class="form-control form-control-lg @error('direccion') is-invalid @enderror" 
                                   value="{{ old('direccion') }}"
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
                                      placeholder="Puntos de referencia, indicaciones adicionales, características del lugar...">{{ old('referencia') }}</textarea>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle mr-1"></i>Información adicional para facilitar la ubicación (opcional)
                            </small>
                            @error('referencia')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Previsualización en tiempo real -->
                        <div class="card preview-card mt-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fas fa-eye mr-2"></i>Vista Previa de la Ubicación
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Dirección:</strong>
                                        <span id="preview-direccion" class="text-muted">-</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Referencia:</strong>
                                        <span id="preview-referencia" class="text-muted">-</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="location-preview p-3 bg-light rounded">
                                            <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                            <strong>Ubicación:</strong>
                                            <span id="preview-completa" class="text-muted">Complete los campos para ver la previsualización</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <button class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-save mr-2"></i>Crear Ubicación
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
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--pizza-red) 0%, var(--pizza-tomato) 100%) !important;
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
        
        .preview-card {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
        }
        
        .preview-card .card-header {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6;
        }
        
        .location-preview {
            border-left: 4px solid var(--pizza-red);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .invalid-feedback {
            font-weight: 500;
        }
        
        .text-pizza {
            color: var(--pizza-red) !important;
        }
        
        /* Animaciones */
        .card {
            animation: slideInUp 0.6s ease;
        }
        
        @keyframes slideInUp {
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
            // Previsualización en tiempo real
            function updatePreview() {
                const direccion = $('#direccion').val() || '-';
                const referencia = $('#referencia').val() || '-';
                
                $('#preview-direccion').text(direccion);
                $('#preview-referencia').text(referencia);
                
                // Preview completa
                let previewCompleta = direccion;
                if (referencia !== '-') {
                    previewCompleta += ' - ' + referencia;
                }
                $('#preview-completa').text(previewCompleta);
                
                // Cambiar estilo si hay datos
                if (direccion !== '-' || referencia !== '-') {
                    $('.location-preview').removeClass('bg-light').addClass('bg-white');
                    $('#preview-completa').removeClass('text-muted').addClass('text-dark');
                } else {
                    $('.location-preview').removeClass('bg-white').addClass('bg-light');
                    $('#preview-completa').removeClass('text-dark').addClass('text-muted');
                }
            }
            
            // Actualizar preview al cambiar los campos
            $('#direccion, #referencia').on('input', updatePreview);
            
            // Validación del formulario
            $('#createLocationForm').on('submit', function(e) {
                const direccion = $('#direccion').val().trim();
                
                if (!direccion) {
                    e.preventDefault();
                    $('#direccion').addClass('is-invalid');
                    $('html, body').animate({
                        scrollTop: $('#direccion').offset().top - 100
                    }, 500);
                    
                    // Mostrar alerta SweetAlert
                    Swal.fire({
                        title: 'Campo requerido',
                        text: 'La dirección es obligatoria para crear la ubicación.',
                        icon: 'warning',
                        confirmButtonColor: 'var(--pizza-red)',
                        confirmButtonText: 'Entendido'
                    });
                    return false;
                }
            });
            
            // Contador de caracteres para dirección
            $('#direccion').on('input', function() {
                const length = $(this).val().length;
                const maxLength = 255;
                const counter = $(this).next('.form-text');
                
                if (counter.find('.char-counter').length === 0) {
                    counter.append('<span class="char-counter text-muted ml-2"></span>');
                }
                
                const counterElement = counter.find('.char-counter');
                counterElement.text(`(${length}/${maxLength})`);
                
                if (length > maxLength * 0.8) {
                    counterElement.removeClass('text-muted').addClass('text-warning');
                } else {
                    counterElement.removeClass('text-warning').addClass('text-muted');
                }
                
                if (length > maxLength) {
                    counterElement.removeClass('text-warning').addClass('text-danger');
                }
            });
            
            // Efectos visuales
            $('.card').hide().fadeIn(600);
            
            // Focus en el primer campo
            setTimeout(function() {
                $('#direccion').focus();
            }, 800);
            
            // Inicializar preview
            updatePreview();
            
            // Trigger inicial para el contador
            $('#direccion').trigger('input');
            
            // Efecto de escritura automática en el placeholder
            let placeholderIndex = 0;
            const placeholders = [
                "Av. Principal #123, Col. Centro",
                "Calle Secundaria #456, Local 5",
                "Plaza Comercial, Nivel 2, Local 12",
                "Edificio Corporativo, Piso 3, Oficina 301"
            ];
            
            function typePlaceholder() {
                if (placeholderIndex < placeholders.length) {
                    $('#direccion').attr('placeholder', placeholders[placeholderIndex]);
                    placeholderIndex++;
                } else {
                    placeholderIndex = 0;
                }
            }
            
            // Cambiar placeholder cada 3 segundos
            setInterval(typePlaceholder, 3000);
        });
    </script>
@stop