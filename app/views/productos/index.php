<?php

// Validar sesión 
require_once __DIR__ . '/../partials/validar_sesion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/dist/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
    <!-- Barra de navegación -->
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <!-- Menú lateral -->
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gestión de Productos</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- Botón para abrir el modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearProductoModal">
                                    Crear Producto
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="productosTable" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Categoría</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data["productos"] as $producto): ?>
                                            <tr>
                                                <td><?php echo $producto['id_producto']; ?></td>
                                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                                <td><?php echo number_format($producto['precio'], 2); ?></td>
                                                <td><?php echo $producto['categoria_id']; ?></td>
                                                <td>
                                                    <button
                                                        class="btn btn-warning btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editarProductoModal"
                                                        onclick="cargarDatosEnModal(
                        '<?php echo $producto['id_producto']; ?>',
                        '<?php echo htmlspecialchars($producto['nombre']); ?>',
                        '<?php echo htmlspecialchars($producto['descripcion']); ?>',
                        '<?php echo number_format($producto['precio'], 2); ?>',
                        '<?php echo $producto['categoria_id']; ?>'
                    )">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="eliminar.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //Modales
    include("modals/crear_producto.php");
    include("modals/editar_producto.php");
    include __DIR__ . '/../partials/footer.php'; ?>
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/dist/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productosTable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
</body>

</html>