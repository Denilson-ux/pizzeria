@extends('adminlte::page')

@section('title', 'Crear Repartidor')

@section('content_header')
    <h1>Crear Nuevo Repartidor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('repartidor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="paterno">Apellido Paterno:</label>
                            <input type="text" name="paterno" id="paterno" class="form-control @error('paterno') is-invalid @enderror" value="{{ old('paterno') }}" required>
                            @error('paterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="materno">Apellido Materno:</label>
                            <input type="text" name="materno" id="materno" class="form-control @error('materno') is-invalid @enderror" value="{{ old('materno') }}" required>
                            @error('materno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" required>
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numero_licencia">Número de Licencia:</label>
                            <input type="text" name="numero_licencia" id="numero_licencia" class="form-control @error('numero_licencia') is-invalid @enderror" value="{{ old('numero_licencia') }}" required>
                            @error('numero_licencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-control-file @error('imagen') is-invalid @enderror" accept="image/*">
                            @error('imagen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Repartidor
                    </button>
                    <a href="{{ route('repartidor.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop