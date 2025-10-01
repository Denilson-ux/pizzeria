@extends('adminlte::page')

@section('title', 'Editar Ubicación')

@section('content_header')
    <h1>Editar Ubicación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ubicaciones.update', $ubicacion) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $ubicacion->direccion) }}" required>
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="referencia">Referencia:</label>
                    <textarea name="referencia" id="referencia" class="form-control @error('referencia') is-invalid @enderror" rows="3">{{ old('referencia', $ubicacion->referencia) }}</textarea>
                    @error('referencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Ubicación
                    </button>
                    <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop