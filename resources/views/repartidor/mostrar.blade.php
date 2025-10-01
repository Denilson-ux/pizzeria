@extends('adminlte::page')

@section('title', 'Detalles del Repartidor')

@section('content_header')
    <h1>Detalles del Repartidor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($repartidor->imagen)
                        <img src="{{ asset('storage/' . $repartidor->imagen) }}" alt="Imagen del repartidor" class="img-fluid rounded-circle" style="max-width: 200px;">
                    @else
                        <img src="{{ asset('img/user-default.png') }}" alt="Sin imagen" class="img-fluid rounded-circle" style="max-width: 200px;">
                    @endif
                </div>
                
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><strong>Nombre:</strong></h5>
                            <p class="text-muted">{{ $repartidor->nombre }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5><strong>Apellido Paterno:</strong></h5>
                            <p class="text-muted">{{ $repartidor->paterno }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5><strong>Apellido Materno:</strong></h5>
                            <p class="text-muted">{{ $repartidor->materno }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5><strong>Teléfono:</strong></h5>
                            <p class="text-muted">{{ $repartidor->telefono }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5><strong>Correo Electrónico:</strong></h5>
                            <p class="text-muted">{{ $repartidor->correo }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5><strong>Número de Licencia:</strong></h5>
                            <p class="text-muted">{{ $repartidor->numero_licencia }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('repartidor.edit', $repartidor) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('repartidor.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </div>
    </div>
@stop