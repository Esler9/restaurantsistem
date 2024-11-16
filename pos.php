<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta | Restaurante</title>
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <span class="navbar-text ml-auto">Punto de Venta para Restaurantes</span>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light">Restaurante POS</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>Punto de Venta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Inventario</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Lista de Ventas</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Menú de Productos</h3>
                                <div class="card-tools">
                                    <input type="text" id="search-box" class="form-control form-control-sm" placeholder="Buscar productos...">
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="product-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-list">
                                        <!-- Productos generados dinámicamente -->
                                        <tr>
                                            <td>1</td>
                                            <td>Hamburguesa</td>
                                            <td>$50.00</td>
                                            <td><button class="btn btn-success btn-sm add-product" data-id="1" data-name="Hamburguesa" data-price="50">Agregar</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Pizza</td>
                                            <td>$75.00</td>
                                            <td><button class="btn btn-success btn-sm add-product" data-id="2" data-name="Pizza" data-price="75">Agregar</button></td>
                                        </tr>
                                        <!-- Más productos se agregarían aquí -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Productos Seleccionados (Derecha) -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Productos Seleccionados</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="selected-products-table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="selected-products-list">
                                        <!-- Productos seleccionados se agregarán aquí -->
                                    </tbody>
                                </table>
                                <button id="finish-order" class="btn btn-primary btn-block">Finalizar Pedido</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="script.js"></script>
<script>
    // Agregar producto a la lista de productos seleccionados
    $(document).on('click', '.add-product', function() {
        const productId = $(this).data('id');
        const productName = $(this).data('name');
        const productPrice = $(this).data('price');

        // Añadir el producto seleccionado a la tabla de productos seleccionados
        $('#selected-products-list').append(`
            <tr data-id="${productId}">
                <td>${productName}</td>
                <td>$${productPrice}</td>
                <td><button class="btn btn-danger btn-sm remove-product">Eliminar</button></td>
            </tr>
        `);
    });

    // Eliminar producto de la lista de productos seleccionados
    $(document).on('click', '.remove-product', function() {
        $(this).closest('tr').remove();
    });

    // Finalizar pedido (acción de ejemplo)
    $('#finish-order').on('click', function() {
        const selectedProducts = [];
        $('#selected-products-list tr').each(function() {
            const name = $(this).find('td').eq(0).text();
            const price = $(this).find('td').eq(1).text();
            selectedProducts.push({ name, price });
        });

        if (selectedProducts.length > 0) {
            alert('Pedido Finalizado\n' + JSON.stringify(selectedProducts, null, 2));
        } else {
            alert('No se ha seleccionado ningún producto.');
        }
    });
</script>
</body>
</html>
