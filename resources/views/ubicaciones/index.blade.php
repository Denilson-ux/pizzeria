@extends('adminlte::page')

@section('title', 'Ubicaciones')

@section('content_header')
    <h1>Lista de Ubicaciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('ubicaciones.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Ubicación
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="ubicaciones-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dirección</th>
                        <th>Referencia</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ubicaciones as $ubicacion)
                    <tr>
                        <td>{{ $ubicacion->id }}</td>
                        <td>{{ $ubicacion->direccion }}</td>
                        <td>
                            @if($ubicacion->referencia)
                                {{ $ubicacion->referencia }}
                            @else
                                <span class="text-muted">Sin referencia</span>
                            @endif
                        </td>
                        <td>{{ $ubicacion->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('ubicaciones.show', $ubicacion) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('ubicaciones.edit', $ubicacion) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('ubicaciones.destroy', $ubicacion) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta ubicación?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#ubicaciones-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "order": [[0, "desc"]]
            });
        });
    </script>
@stop