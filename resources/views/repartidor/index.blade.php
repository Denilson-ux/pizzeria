@extends('adminlte::page')

@section('title', 'Repartidores')

@section('content_header')
    <h1>Lista de Repartidores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('repartidor.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Repartidor
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="repartidores-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>N° Licencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repartidores as $repartidor)
                    <tr>
                        <td>{{ $repartidor->id }}</td>
                        <td>
                            @if($repartidor->imagen)
                                <img src="{{ asset('storage/' . $repartidor->imagen) }}" alt="Imagen" class="img-circle" width="40" height="40">
                            @else
                                <img src="{{ asset('img/user-default.png') }}" alt="Sin imagen" class="img-circle" width="40" height="40">
                            @endif
                        </td>
                        <td>{{ $repartidor->nombre }} {{ $repartidor->paterno }} {{ $repartidor->materno }}</td>
                        <td>{{ $repartidor->telefono }}</td>
                        <td>{{ $repartidor->correo }}</td>
                        <td>{{ $repartidor->numero_licencia }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('repartidor.show', $repartidor) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('repartidor.edit', $repartidor) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('repartidor.destroy', $repartidor) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este repartidor?')">
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
            $('#repartidores-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }
            });
        });
    </script>
@stop