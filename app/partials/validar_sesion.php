<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login si no hay sesión activa

    header('Location: /login');
    exit;
}

// Almacenar datos del usuario logueado
$usuario_id = $_SESSION['usuario_id'];
?>
