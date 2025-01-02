<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ingredientes</title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/dist/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body>
    <!-- Barra de navegación -->
    <?php include '../partials/navbar.php'; ?>

    <!-- Menú lateral -->
    <?php include '../partials/sidebar.php'; ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gestión de Ingredientes</h1>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearIngredienteModal">
                                    <i class="fas fa-plus"></i> Agregar Ingrediente
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="ingredientesTable" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cantidad Disponible</th>
                                            <th>Unidad de Medida</th>
                                            <th>Stock Mínimo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ingredientes as $ingrediente): ?>
                                            <tr>
                                                <td><?php echo $ingrediente['id_ingrediente']; ?></td>
                                                <td><?php echo htmlspecialchars($ingrediente['nombre']); ?></td>
                                                <td><?php echo htmlspecialchars($ingrediente['cantidad_disponible']); ?></td>
                                                <td><?php echo htmlspecialchars($ingrediente['unidad_medida']); ?></td>
                                                <td><?php echo htmlspecialchars($ingrediente['stock_minimo']); ?></td>
                                                <td>
                                                    <button 
                                                        class="btn btn-warning btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#editarIngredienteModal" 
                                                        onclick="cargarDatosIngrediente(
                                                            '<?php echo $ingrediente['id_ingrediente']; ?>',
                                                            '<?php echo htmlspecialchars($ingrediente['nombre']); ?>',
                                                            '<?php echo htmlspecialchars($ingrediente['cantidad_disponible']); ?>',
                                                            '<?php echo htmlspecialchars($ingrediente['unidad_medida']); ?>',
                                                            '<?php echo htmlspecialchars($ingrediente['stock_minimo']); ?>'
                                                        )">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="eliminar_ingrediente.php?id_ingrediente=<?php echo $ingrediente['id_ingrediente']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este ingrediente?');">
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

    <?php include '../partials/footer.php'; ?>

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
            $('#ingredientesTable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
</body>
</html>
