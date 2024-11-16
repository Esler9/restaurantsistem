<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Panel de productos -->
            <div class="col-md-6">
                <h2 class="text-center">Productos</h2>
                <div id="product-list" class="list-group">
                    <!-- Productos se generarán dinámicamente -->
                </div>
            </div>
            <!-- Carrito -->
            <div class="col-md-6">
                <h2 class="text-center">Carrito</h2>
                <ul id="cart-list" class="list-group mb-3"></ul>
                <div class="d-flex justify-content-between">
                    <strong>Total:</strong>
                    <span id="total-amount">$0.00</span>
                </div>
                <button id="checkout-btn" class="btn btn-success btn-block mt-3">Finalizar Venta</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
