<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta - Restaurante</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container my-5">
    <div class="row">
        <!-- Sección de Productos -->
        <div class="col-md-6 mb-4">
            <h2 class="text-center">Productos</h2>
            <div class="list-group">
                <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Producto 1
                    <button class="btn btn-primary btn-sm add-to-cart">Agregar</button>
                </button>
                <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Producto 2
                    <button class="btn btn-primary btn-sm add-to-cart">Agregar</button>
                </button>
                <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Producto 3
                    <button class="btn btn-primary btn-sm add-to-cart">Agregar</button>
                </button>
            </div>
        </div>

        <!-- Sección de Carrito -->
        <div class="col-md-6">
            <h2 class="text-center">Carrito</h2>
            <ul class="list-group cart-list mb-3">
                <!-- Productos agregados se mostrarán aquí -->
            </ul>
            <div class="d-flex justify-content-between align-items-center">
                <strong>Total:</strong>
                <span id="total-amount" class="font-weight-bold">$0.00</span>
            </div>
            <button class="btn btn-success btn-block mt-3 checkout-btn">Finalizar Venta</button>
        </div>
    </div>
</div>

<!-- Enlace a jQuery, Popper.js y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
