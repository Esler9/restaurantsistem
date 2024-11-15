<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta - Restaurante</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="pos-container">
    <!-- Sección de productos -->
    <div class="product-section">
        <h2>Productos</h2>
        <div class="product-list">
            <div class="product">
                <p>Producto 1</p>
                <button class="add-to-cart">Agregar</button>
            </div>
            <div class="product">
                <p>Producto 2</p>
                <button class="add-to-cart">Agregar</button>
            </div>
            <div class="product">
                <p>Producto 3</p>
                <button class="add-to-cart">Agregar</button>
            </div>
        </div>
    </div>

    <!-- Sección de carrito -->
    <div class="cart-section">
        <h2>Carrito</h2>
        <div class="cart-list">
            <!-- Aquí se agregarán los productos seleccionados -->
        </div>
        <div class="cart-total">
            <p>Total: <span id="total-amount">$0.00</span></p>
        </div>
        <button class="checkout-btn">Finalizar Venta</button>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
