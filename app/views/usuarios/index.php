<?php
// Validar que la sesión esté activa
require_once __DIR__ . '/../partials/validar_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dist/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Barra de navegación -->
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <!-- Menú lateral -->
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestión de Usuarios</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-users"></i> Lista de Usuarios</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearUsuarioModal">
                                <i class="fas fa-user-plus"></i> Nuevo Usuario
                            </button>
                        </div>
                    </div>
                    <!-- Tabla de usuarios -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablaUsuarios" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['usuarios'] as $usuario): ?>
                                        <tr>
                                            <td><?= $usuario['id_usuario'] ?></td>
                                            <td><?= $usuario['nombre'] ?></td>
                                            <td><?= $usuario['correo'] ?></td>
                                            <td><?= ucfirst($usuario['rol']) ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarUsuarioModal<?= $usuario['id_usuario'] ?>">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal para editar usuario -->
                                        <?php include __DIR__ . '/modals/editar_usuario.php'; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal para crear usuario -->
    <?php include __DIR__ . '/modals/crear_usuario.php'; ?>

    <!-- Pie de página -->
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="/dist/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/dist/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <script>
        // Inicializar DataTables
        $(document).ready(function () {
            $('#tablaUsuarios').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: "/dist/plugins/datatables/i18n/es_es.json"
                }
            });
        });
    </script>
</body>

</html>
