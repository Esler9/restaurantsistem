<!DOCTYPE html>
<?php
require_once '../../validar_sesion.php';
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>
    <header>
        <h1>Sistema de Inventario</h1>
    </header>
    <main>
        <h1><?= $data['mensaje'] ?></h1>
        <p>Bienvenido al sistema de inventario. Administre sus productos, revise existencias y optimice su restaurante.</p>
        <div>
            <a href="login" class="button">Gestión de Productos</a>
            <a href="ventas" class="button">Gestión de Ventas</a>
            <a href="inventario" class="button">Ver Inventario</a>
        </div>
    </main>
    <footer>
        <p>&copy; <?= date('Y'); ?> Sistema de Inventario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
