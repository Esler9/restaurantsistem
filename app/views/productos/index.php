<?php
// Incluir la validación de sesión y otros componentes necesarios
include '../partials/validar_sesion.php';
include '../partials/navbar.php';
include '../partials/sidebar.php';

// Cargar el modelo de productos
include '../../models/producto.php';

$productos = Producto::obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administración de Productos y Recetas</h1>
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
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                    <tr>
                                        <td><?php echo $producto['id']; ?></td>
                                        <td><?php echo $producto['nombre']; ?></td>
                                        <td><?php echo $producto['descripcion']; ?></td>
                                        <td><?php echo $producto['precio']; ?></td>
                                        <td><?php echo $producto['stock']; ?></td>
                                        <td>
                                            <a href="editar.php?id=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="eliminar.php?id=<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                                            <a href="ingredientes.php?producto_id=<?php echo $producto['id']; ?>" class="btn btn-info btn-sm">Ver Ingredientes</a>
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
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
