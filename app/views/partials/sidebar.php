<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logotipo del sistema -->
    <a href="/dashboard" class="brand-link">
        <img src="/dist/images/logo.png" alt="Logo del Sistema" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema Inventario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Usuario logueado -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/images/user-default.jpg" class="img-circle elevation-2" alt="Usuario">
            </div>
            <div class="info">
                <a href="/perfil" class="d-block">
                    <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Invitado'); ?>
                </a>
            </div>
        </div>

        <!-- Menú de navegación -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Gestión de usuarios -->
                <li class="nav-item">
                    <a href="/usuarios" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Gestión de Usuarios</p>
                    </a>
                </li>

                <!-- Gestión de productos -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Gestión de Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/productos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ingredientes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ingredientes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Ventas -->
                <li class="nav-item">
                    <a href="/ventas" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Ventas</p>
                    </a>
                </li>

                <!-- Pedidos -->
                <li class="nav-item">
                    <a href="/pedidos" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Pedidos Pendientes</p>
                    </a>
                </li>

                <!-- Reportes -->
                <li class="nav-item">
                    <a href="/reportes" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Reportes</p>
                    </a>
                </li>

                <!-- Configuración -->
                <li class="nav-item">
                    <a href="/configuracion" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Configuración</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
