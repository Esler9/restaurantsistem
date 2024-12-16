<?php
session_start(); // Iniciar sesión

session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión

header("Location: /login/index.php"); // Redirigir al inicio de sesión
exit;
?>