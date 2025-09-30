<?php

return [

    'title' => 'PizzaMaster Pro',
    'title_prefix' => '',
    'title_postfix' => ' | Sistema de Pizzería',

    'use_ico_only' => true,
    'use_full_favicon' => false,

    'google_fonts' => [
        'allowed' => true,
    ],

    'logo' => '<b>Pizza</b>MASTER',
    'logo_img' => '/vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'PizzaMaster Logo',

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => '/vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'PizzaMaster Auth Logo',
            'class' => '',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => '/vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'PizzaMaster Preloader Image',
            'effect' => 'animation__fadeIn',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-gradient-pizza',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    'classes_auth_card' => 'card-outline card-pizza bg-gradient-auth',
    'classes_auth_header' => 'text-center',
    'classes_auth_body' => 'text-center',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    'classes_body' => 'accent-pizza',
    'classes_brand' => 'bg-gradient-pizza',
    'classes_brand_text' => 'text-light',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-pizza elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light bg-gradient-pizza',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-pizza-slice',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    'menu' => [
        [
            'type' => 'navbar-search',
            'text' => 'Buscar pedidos, clientes...',
            'topnav_right' => true,
            'icon' => 'fas fa-search',
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        [
            'type' => 'darkmode-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'text' => 'Dashboard',
            'url' => 'home',
            'icon' => 'fas fa-tachometer-alt',
            'icon_color' => 'orange',
            'label_color' => 'success',
        ],
        [
            'text' => 'Estadísticas',
            'url' => 'stats',
            'icon' => 'fas fa-chart-pie',
            'icon_color' => 'tomato',
        ],
        
        ['header' => 'GESTIÓN DE PEDIDOS', 'classes' => 'text-uppercase text-pizza'],
        [
            'text' => 'Pedidos Activos',
            'url' => 'admin/orders',
            'icon' => 'fas fa-shopping-cart',
            'icon_color' => 'success',
            'label' => 12,
            'label_color' => 'danger',
        ],
        [
            'text' => 'Historial Pedidos',
            'url' => 'admin/orders-history',
            'icon' => 'fas fa-history',
            'icon_color' => 'info',
        ],
        [
            'text' => 'Clientes',
            'url' => 'admin/clients',
            'icon' => 'fas fa-users',
            'icon_color' => 'warning',
        ],

        ['header' => 'INVENTARIO Y MENÚ', 'classes' => 'text-uppercase text-pizza'],
        [
            'text' => 'Menú de Pizzas',
            'url' => 'admin/products',
            'icon' => 'fas fa-pizza-slice',
            'icon_color' => 'danger',
        ],
        [
            'text' => 'Ingredientes',
            'url' => 'admin/ingredients',
            'icon' => 'fas fa-cheese',
            'icon_color' => 'yellow',
        ],
        [
            'text' => 'Categorías',
            'url' => 'admin/categories',
            'icon' => 'fas fa-tags',
            'icon_color' => 'green',
        ],
        [
            'text' => 'Promociones',
            'url' => 'admin/promotions',
            'icon' => 'fas fa-percent',
            'icon_color' => 'pink',
        ],

        ['header' => 'LOGÍSTICA Y ENTREGAS', 'classes' => 'text-uppercase text-pizza'],
        [
            'text' => 'Tipos de Vehículos',
            'url' => 'tipovehiculos',
            'icon' => 'fas fa-motorcycle',
            'icon_color' => 'info',
        ],
        [
            'text' => 'Ubicaciones',
            'url' => '/ubicaciones',
            'icon' => 'fas fa-map-marker-alt',
            'icon_color' => 'success',
        ],
        [
            'text' => 'Repartidores',
            'url' => 'admin/delivery',
            'icon' => 'fas fa-user-clock',
            'icon_color' => 'primary',
        ],

        ['header' => 'CONFIGURACIÓN', 'classes' => 'text-uppercase text-pizza'],
        [
            'text' => 'Usuarios',
            'url' => 'admin/users',
            'icon' => 'fas fa-user-cog',
            'icon_color' => 'indigo',
        ],
        [
            'text' => 'Configuración',
            'url' => 'admin/settings',
            'icon' => 'fas fa-cogs',
            'icon_color' => 'gray',
        ],
        [
            'text' => 'Soporte',
            'url' => 'admin/support',
            'icon' => 'fas fa-headset',
            'icon_color' => 'teal',
        ],
        
        ['header' => 'INFORMES Y REPORTES', 'classes' => 'text-uppercase text-pizza'],
        [
            'text' => 'Reportes',
            'icon' => 'fas fa-chart-bar',
            'icon_color' => 'purple',
            'submenu' => [
                [
                    'text' => 'Ventas Diarias',
                    'url' => 'reports/sales',
                    'icon' => 'fas fa-money-bill-wave',
                    'icon_color' => 'success',
                ],
                [
                    'text' => 'Pedidos por Repartidor',
                    'url' => 'reports/delivery',
                    'icon' => 'fas fa-motorcycle',
                    'icon_color' => 'info',
                ],
                [
                    'text' => 'Productos Más Vendidos',
                    'url' => 'reports/products',
                    'icon' => 'fas fa-pizza-slice',
                    'icon_color' => 'danger',
                ],
                [
                    'text' => 'Clientes Frecuentes',
                    'url' => 'reports/clients',
                    'icon' => 'fas fa-user-friends',
                    'icon_color' => 'warning',
                ],
            ],
        ],
        [
            'text' => 'Notificaciones',
            'url' => 'admin/notifications',
            'icon' => 'fas fa-bell',
            'icon_color' => 'yellow',
            'label' => 15,
            'label_color' => 'danger',
        ],
    ],

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/chart.js/Chart.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
                ],
            ],
        ],
        'Pace' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/pace-progress/themes/orange/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/pace-progress/pace.min.js',
                ],
            ],
        ],
        'Toastr' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.css',
                ],
            ],
        ],
    ],

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    'livewire' => true,
];