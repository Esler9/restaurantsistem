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
</head>
<body>
<div class="content-wrapper">
     <!-- Barra de navegación -->
     <?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Menú lateral -->
<?php include __DIR__ . '/../partials/sidebar.php'; ?>
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
                            <a href="crear.php" class="btn btn-primary">Agregar Producto</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                    <tr>
                                        <td><?php echo $producto['id_producto']; ?></td>
                                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                        <td><?php echo number_format($producto['precio'], 2); ?></td>
                                        <td><?php echo $producto['stock']; ?></td>
                                        <td><?php echo $producto['categoria_id']; ?></td>
                                        <td>
                                            <a href="editar.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="eliminar.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
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

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
