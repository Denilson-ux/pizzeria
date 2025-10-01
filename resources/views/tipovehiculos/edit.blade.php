@extends('adminlte::page')

@section('title', 'Editar Tipo de Vehículo')

@section('content_header')
    <h1>Editar Tipo de Vehículo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tipovehiculos.update', $tipo) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $tipo->nombre) }}" required>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $tipo->descripcion) }}</textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                        <option value="1" {{ old('estado', $tipo->estado) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('estado', $tipo->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('tipovehiculos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop