<?php
// Validar que la sesión esté activa
require_once __DIR__ . '../partials/';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Inventario</title>
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barra de navegación -->
        <?php include __DIR__ . '../partials/navbar.php'; ?>

        <!-- Menú lateral -->
        <?php include __DIR__ . '../partials/sidebar.php'; ?>

        <!-- Contenido principal -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contenido principal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Tarjeta 1 -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Productos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <a href="/productos" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Tarjeta 2 -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53</h3>
                                    <p>Ventas de Hoy</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="/ventas" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Tarjeta 3 -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="/usuarios" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Tarjeta 4 -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Pedidos Pendientes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <a href="/pedidos" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Pie de página -->
        <?php include __DIR__ . '../partials/footer.php'; ?>
    </div>
    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE -->
    <script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
