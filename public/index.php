<?php
// incluir la configuración y las clases principales
require_once '../config/database.php'; // conexión a la base de datos
require_once '../core/app.php';        // clase de enrutamiento
require_once '../core/controller.php'; // clase base de los controladores

// iniciar la aplicación
$app = new app();
?>
