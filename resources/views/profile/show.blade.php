@extends('adminlte::page')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-circle mr-2"></i>{{ __('Perfil de Usuario') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" 
                             src="{{ auth()->user()->profile_photo_url ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}" 
                             alt="User profile picture">
                    </div>
                    
                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                    
                    <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><i class="fas fa-calendar-alt mr-1"></i> Miembro desde</b> 
                            <a class="float-right">{{ auth()->user()->created_at->format('d/m/Y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-sync-alt mr-1"></i> Última actualización</b> 
                            <a class="float-right">{{ auth()->user()->updated_at->format('d/m/Y') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Menu lateral -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-cog mr-1"></i>Opciones</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                            <a href="#information" class="nav-link" data-toggle="tab">
                                <i class="fas fa-user mr-2"></i> Información Personal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" class="nav-link" data-toggle="tab">
                                <i class="fas fa-lock mr-2"></i> Contraseña
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#2fa" class="nav-link" data-toggle="tab">
                                <i class="fas fa-shield-alt mr-2"></i> Autenticación de Dos Factores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sessions" class="nav-link" data-toggle="tab">
                                <i class="fas fa-desktop mr-2"></i> Sesiones Activas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#delete" class="nav-link text-danger" data-toggle="tab">
                                <i class="fas fa-exclamation-triangle mr-2"></i> Eliminar Cuenta
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Gestión de Perfil</h3>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Información Personal -->
                        <div class="tab-pane active" id="information">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-user-edit mr-1"></i>Actualizar Información Personal</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Actualice la información de perfil y dirección de correo electrónico de su cuenta.</p>
                                    
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="name" value="administrador" placeholder="Nombre">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email" value="admin@pizzeria.com" placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg">
                                            <i class="fas fa-save mr-2"></i>Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contraseña -->
                        <div class="tab-pane" id="password">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-lock mr-1"></i>Cambiar Contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_password">Contraseña Actual</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="current_password" placeholder="Contraseña actual">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="new_password">Nueva Contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="new_password" placeholder="Nueva contraseña">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="confirm_password">Confirmar Nueva Contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="confirm_password" placeholder="Confirmar nueva contraseña">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg">
                                            <i class="fas fa-save mr-2"></i>Actualizar Contraseña
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Autenticación de Dos Factores -->
                        <div class="tab-pane" id="2fa">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-shield-alt mr-1"></i>Autenticación de Dos Factores</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Proteja adicionalmente su cuenta utilizando la autenticación de dos factores.</p>
                                    
                                    <div class="alert alert-info">
                                        <h5><i class="icon fas fa-info"></i> Información</h5>
                                        La autenticación de dos factores añade una capa adicional de seguridad a su cuenta.
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="2faSwitch">
                                            <label class="custom-control-label" for="2faSwitch">Activar autenticación de dos factores</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg">
                                            <i class="fas fa-save mr-2"></i>Guardar Configuración
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sesiones Activas -->
                        <div class="tab-pane" id="sessions">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-desktop mr-1"></i>Sesiones Activas</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Gestione y cierre sus sesiones activas en otros navegadores y dispositivos.</p>
                                    
                                    <div class="alert alert-warning">
                                        <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia</h5>
                                        Si considera que su cuenta ha sido comprometida, debe cerrar todas las sesiones activas.
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Dispositivo</th>
                                                    <th>IP</th>
                                                    <th>Última Actividad</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Chrome - Windows</td>
                                                    <td>192.168.1.15</td>
                                                    <td>Hace 2 minutos</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-times"></i> Cerrar
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Firefox - Linux</td>
                                                    <td>192.168.1.20</td>
                                                    <td>Hace 30 minutos</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-times"></i> Cerrar
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-danger">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Todas las Sesiones
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Eliminar Cuenta -->
                        <div class="tab-pane" id="delete">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-exclamation-triangle mr-1"></i>Eliminar Cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-danger">
                                        <h5><i class="icon fas fa-ban"></i> ¡Advertencia!</h5>
                                        Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. 
                                        Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#confirmDelete">
                                            <i class="fas fa-trash-alt mr-2"></i>Eliminar Cuenta
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de confirmación para eliminar cuenta -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar su cuenta? Esta acción no se puede deshacer.</p>
                    <div class="form-group">
                        <label for="passwordConfirm">Ingrese su contraseña para confirmar:</label>
                        <input type="password" class="form-control" id="passwordConfirm" placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Eliminar Cuenta Permanentemente</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .profile-user-img {
            border: 3px solid #3c8dbc;
            margin: 0 auto;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .card-primary.card-outline {
            border-top: 3px solid #3c8dbc;
        }
        .btn-success {
            background: linear-gradient(to right, #28a745, #20c997);
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background: linear-gradient(to right, #218838, #1aa179);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }
        .nav-pills .nav-link.active {
            background-color: #3c8dbc;
            box-shadow: 0 2px 5px rgba(60, 141, 188, 0.3);
        }
        .input-group-text {
            background-color: #e8f0fe;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Activar la pestaña correcta según el hash de la URL
            if (window.location.hash) {
                $('.nav-pills a[href="' + window.location.hash + '"]').tab('show');
            }
            
            // Cambiar la URL cuando se hace clic en las pestañas
            $('.nav-pills a').on('click', function(e) {
                history.pushState(null, null, $(this).attr('href'));
            });
            
            // Tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop