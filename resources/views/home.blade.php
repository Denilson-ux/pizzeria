@extends('adminlte::page')

@section('title', 'Dashboard - Pizza Bambinos')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="text-primary mb-1"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h1>
        </div>
    </div>
@stop

@section('content')
    <!-- Welcome Banner -->
    <div class="card bg-gradient-primary border-0 shadow-lg mb-4 overflow-hidden">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="text-white mb-2"><i class="fas fa-pizza-slice mr-2"></i>¡Bienvenido a Pizza Bambinos!</h3>
                    <p class="text-white-50 mb-0">Gestiona tu negocio de manera eficiente y aumenta tus ventas</p>
                </div>
                <div class="col-md-4 text-right">
                    <div class="bg-white-20 rounded-lg p-3 d-inline-block">
                        <i class="fas fa-chart-line fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pedidos Activos
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            <div class="mt-2">
                                <span class="badge badge-success">+2 hoy</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Clientes Hoy
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                            <div class="mt-2">
                                <span class="badge badge-info">+1 nuevo</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pizzas Vendidas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                            <div class="mt-2">
                                <span class="badge badge-danger">+15%</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pizza-slice fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Ingresos Hoy
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$320</div>
                            <div class="mt-2">
                                <span class="badge badge-success">+$45</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Quick Actions -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-bolt mr-2"></i>Acciones Rápidas
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ url('admin/orders') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <div class="icon-circle bg-primary mr-3">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 text-dark">Nuevo Pedido</h6>
                                <small class="text-muted">Crear un nuevo pedido para cliente</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ url('admin/products') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <div class="icon-circle bg-danger mr-3">
                                <i class="fas fa-pizza-slice text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 text-dark">Gestionar Menú</h6>
                                <small class="text-muted">Agregar o modificar pizzas</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ url('admin/clients') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3">
                            <div class="icon-circle bg-info mr-3">
                                <i class="fas fa-user-plus text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 text-dark">Agregar Cliente</h6>
                                <small class="text-muted">Registrar nuevo cliente</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-history mr-2"></i>Actividad Reciente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="activity-feed">
                        <div class="feed-item d-flex align-items-start mb-3">
                            <div class="feed-marker bg-primary"></div>
                            <div class="feed-content ms-3">
                                <h6 class="mb-1 text-dark">Nuevo pedido #0012 recibido</h6>
                                <p class="mb-1 text-muted">Cliente: Juan Pérez - Total: $25.00</p>
                                <small class="text-muted"><i class="far fa-clock mr-1"></i>Hace 5 minutos</small>
                            </div>
                        </div>
                        <div class="feed-item d-flex align-items-start mb-3">
                            <div class="feed-marker bg-success"></div>
                            <div class="feed-content ms-3">
                                <h6 class="mb-1 text-dark">Pedido #0011 entregado</h6>
                                <p class="mb-1 text-muted">Entregado por: Carlos López</p>
                                <small class="text-muted"><i class="far fa-clock mr-1"></i>Hace 15 minutos</small>
                            </div>
                        </div>
                        <div class="feed-item d-flex align-items-start mb-3">
                            <div class="feed-marker bg-warning"></div>
                            <div class="feed-content ms-3">
                                <h6 class="mb-1 text-dark">Cliente nuevo registrado</h6>
                                <p class="mb-1 text-muted">María González se registró en el sistema</p>
                                <small class="text-muted"><i class="far fa-clock mr-1"></i>Hace 30 minutos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Sections -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-th-large mr-2"></i>Módulos del Sistema
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $modules = [
                                [
                                    'title' => 'Gestión de Pedidos',
                                    'icon' => 'shopping-cart',
                                    'color' => 'primary',
                                    'items' => [
                                        ['name' => 'Pedidos Activos', 'url' => 'admin/orders', 'icon' => 'circle', 'badge' => '12'],
                                        ['name' => 'Historial Pedidos', 'url' => 'admin/orders-history', 'icon' => 'history'],
                                        ['name' => 'Clientes', 'url' => 'admin/clients', 'icon' => 'users']
                                    ]
                                ],
                                [
                                    'title' => 'Inventario y Menú',
                                    'icon' => 'utensils',
                                    'color' => 'success',
                                    'items' => [
                                        ['name' => 'Menú de Pizzas', 'url' => 'admin/products', 'icon' => 'pizza-slice'],
                                        ['name' => 'Ingredientes', 'url' => 'admin/ingredients', 'icon' => 'cheese'],
                                        ['name' => 'Categorías', 'url' => 'admin/categories', 'icon' => 'tags'],
                                        ['name' => 'Promociones', 'url' => 'admin/promotions', 'icon' => 'percent']
                                    ]
                                ],
                                [
                                    'title' => 'Logística y Entregas',
                                    'icon' => 'truck',
                                    'color' => 'info',
                                    'items' => [
                                        ['name' => 'Tipos de Vehículos', 'url' => 'tipovehiculos', 'icon' => 'motorcycle'],
                                        ['name' => 'Ubicaciones', 'url' => '/ubicaciones', 'icon' => 'map-marker-alt'],
                                        ['name' => 'Repartidores', 'url' => 'admin/delivery', 'icon' => 'user-clock']
                                    ]
                                ],
                                [
                                    'title' => 'Configuración',
                                    'icon' => 'cogs',
                                    'color' => 'secondary',
                                    'items' => [
                                        ['name' => 'Usuarios', 'url' => 'admin/users', 'icon' => 'user-cog'],
                                        ['name' => 'Configuración', 'url' => 'admin/settings', 'icon' => 'cogs'],
                                        ['name' => 'Soporte', 'url' => 'admin/support', 'icon' => 'headset']
                                    ]
                                ]
                            ];
                        @endphp

                        @foreach($modules as $module)
                        <div class="col-xl-6 mb-4">
                            <div class="module-card">
                                <h6 class="module-title text-{{ $module['color'] }} font-weight-bold mb-3">
                                    <i class="fas fa-{{ $module['icon'] }} mr-2"></i>{{ $module['title'] }}
                                </h6>
                                <div class="list-group">
                                    @foreach($module['items'] as $item)
                                    <a href="{{ url($item['url']) }}" class="list-group-item list-group-item-action d-flex align-items-center mb-2">
                                        <i class="fas fa-{{ $item['icon'] }} text-{{ $module['color'] }} mr-3"></i>
                                        <span class="text-dark flex-grow-1">{{ $item['name'] }}</span>
                                        @if(isset($item['badge']))
                                        <span class="badge badge-danger">{{ $item['badge'] }}</span>
                                        @endif
                                        <i class="fas fa-arrow-right text-muted ml-2"></i>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .content-wrapper {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%) !important;
            min-height: calc(100vh - 100px);
        }
        
        .card {
            border: none;
            border-radius: 15px !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
        
        .border-left-primary {
            border-left: 4px solid #1e3c72 !important;
        }
        
        .border-left-success {
            border-left: 4px solid #28a745 !important;
        }
        
        .border-left-warning {
            border-left: 4px solid #ffc107 !important;
        }
        
        .border-left-info {
            border-left: 4px solid #17a2b8 !important;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
        }
        
        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .activity-feed .feed-item {
            position: relative;
        }
        
        .feed-marker {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-top: 6px;
            flex-shrink: 0;
        }
        
        .feed-content {
            flex-grow: 1;
        }
        
        .module-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e3e6f0;
            height: 100%;
        }
        
        .module-title {
            font-size: 1.1rem;
            border-bottom: 2px solid;
            padding-bottom: 10px;
        }
        
        .list-group-item {
            border: 1px solid #e3e6f0;
            border-radius: 8px !important;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            padding: 12px 15px;
        }
        
        .list-group-item:hover {
            background-color: #f8f9fa;
            border-color: #1e3c72;
            transform: translateX(5px);
        }
        
        .rounded-lg {
            border-radius: 12px !important;
        }
        
        .bg-white-20 {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Dashboard Pizza Bambinos cargado correctamente');
        
        // Animación simple para las tarjetas de estadísticas
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate__animated', 'animate__fadeInUp');
            });
        });
    </script>
@stop