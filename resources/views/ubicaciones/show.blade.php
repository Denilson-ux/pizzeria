@extends('adminlte::page')

@section('title', 'Detalles de Ubicación')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark"><i class="fas fa-eye mr-2"></i>Detalles de Ubicación</h1>
        <div>
            <a href="{{ route('ubicaciones.edit', $ubicacione) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>Volver
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient-info text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-info-circle mr-2"></i>Información Detallada</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-primary mb-1">
                                    <i class="fas fa-hashtag mr-2"></i>ID
                                </h6>
                                <p class="mb-0">{{ $ubicacione->id }}</p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-primary mb-1">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Dirección
                                </h6>
                                <p class="mb-0">{{ $ubicacione->direccion }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-primary mb-1">
                                    <i class="fas fa-clock mr-2"></i>Fecha de Creación
                                </h6>
                                <p class="mb-0">{{ $ubicacione->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            
                            <div class="info-item mb-4">
                                <h6 class="font-weight-bold text-primary mb-1">
                                    <i class="fas fa-sync-alt mr-2"></i>Última Actualización
                                </h6>
                                <p class="mb-0">{{ $ubicacione->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <h6 class="font-weight-bold text-primary mb-1">
                            <i class="fas fa-signs-post mr-2"></i>Referencia
                        </h6>
                        <p class="mb-0">
                            @if($ubicacione->referencia)
                                {{ $ubicacione->referencia }}
                            @else
                                <span class="text-muted">Sin referencia especificada</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <form action="{{ route('ubicaciones.destroy', $ubicacione) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta ubicación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i>Eliminar Ubicación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 10px;
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
        }
        
        .info-item {
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
        }
        
        .info-item h6 {
            color: #2c3e50;
        }
    </style>
@stop