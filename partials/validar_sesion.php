<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirigir al login si no hay sesión activa
    header('Location: /login');
    exit;
}

// Almacenar datos del usuario logueado
$usuario = $_SESSION['usuario'];
?>
